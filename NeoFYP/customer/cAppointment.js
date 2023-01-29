let cachedData = {};
function serviceCallSlots(date){
  const dt = new Date(date);
  let ms = dt.getTime();
  let startMs = ms - (60*60*24*1000 * 2);
  const dtArr = [1,2,3,4,5].map((e)=>{
    const innerDt =  new Date(startMs);
    startMs += 60*60*24*1000;
    return innerDt;
  });
  const timeArrs = [
    ['9','10','11','12','1','2','3','4','5'],
    ['9','10','11','1','2','3','4','5'],
    ['9','10','11','12','3','4','5'],
    ['10','11','2','4'],
    ['11','12','1','4','5']
  ];
  return new Promise((resolve, reject) => {
      setTimeout(() => {
        //construct object
        const obj = dtArr.reduce((accum,e) => {
          const randomNum = Math.floor(Math.random()*5);
          const dtString = e.toLocaleDateString();
          let parts = dtString.split('/');
          parts[0] = parts[0].length === 1 ? '0' + parts[0] : parts[0];
          parts[1] = parts[1].length === 1 ? '0' + parts[1] : parts[1];
          accum[parts.join('/')] = timeArrs[randomNum];
          return accum;
        },{});
        resolve(obj);

      },2000);
    
  })

}

function spinner(startOrStop){
  const spin = document.querySelector('.spin-me');
  if(startOrStop === 'start'){
      const spinner = document.createElement('i');
    spinner.setAttribute('class','fas fa-spinner fa-4x fa-spin');
  
    spin.appendChild(spinner);
  }
  else{
    spin.innerHTML = '';
  }

}


function createSlotsDom(formSubmit, morning, afternoon,arr){
  [9,10,11,12,1,2,3,4,5].map((e) => {
    const div = document.createElement('div');
    div.setAttribute('class','item');
    const button = document.createElement('button');
    button.setAttribute('class','hollow button');
    button.setAttribute('href','javascript:void(0)');
    const time = (e.length === 1 ? `0${e}` : e) + ':00';
    const txt = document.createTextNode(time);
    button.appendChild(txt);
    button.onclick = function(e){
      formSubmit.classList.remove('disabled');
    }
    if(!arr.filter(r => r == e).length){
      button.setAttribute('disabled','true');
    }
    div.appendChild(button);
    if(e >= 9 && e < 12){
      morning.appendChild(div);
    }
    else {
      afternoon.appendChild(div);
    }


  });

}
  

$( "#datepicker" ).datepicker({
    onSelect: function (date) {
      const container = document.querySelector('.master-container-slots');
      const morning = document.querySelector('.flex-container-morning');
      const afternoon = document.querySelector('.flex-container-afternoon');

      const formSubmit = document.querySelector('.form-submit');
      formSubmit.classList.add('disabled');
      
      container.classList.add('hide');
      
      if(cachedData[date]){
        console.log(`we have cached data so don't make call`);
        console.log(Object.keys(cachedData));
        spinner('start');
        
        setTimeout(()=>{
          morning.innerHTML = '';
          afternoon.innerHTML = '';
          createSlotsDom(formSubmit, morning, afternoon, cachedData[date]);
          spinner('stop');
          container.classList.remove('hide');
          container.classList.add('fade-in');
        },500);
     
      }
      else{
        spinner('start');
        const prom = serviceCallSlots(date);
        setTimeout(()=> {
          morning.innerHTML = '';
          afternoon.innerHTML = '';
          prom.then((payload) => {
            Object.keys(payload).map((e) => {
              const cachedKeys = Object.keys(cachedData);
              if(!cachedKeys.includes(e)){
                cachedData[e] = payload[e];
              }
            });
            
            createSlotsDom(formSubmit, morning, afternoon, cachedData[date]);
            spinner('stop');
            container.classList.remove('hide');
            container.classList.add('fade-in');

          });
        },500);
      }
    }
});

$('.ui-datepicker-current-day').click();




