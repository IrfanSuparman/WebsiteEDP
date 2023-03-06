const themeMap = {
    dark: "light",
    light: "solar",
    solar: "dark"
  };
  
  const theme = localStorage.getItem('theme')
    || (tmp = Object.keys(themeMap)[0],
        localStorage.setItem('theme', tmp),
        tmp);
  const bodyClass = document.body.classList;
  bodyClass.add(theme);
  
  function toggleTheme() {
    const current = localStorage.getItem('theme');
    const next = themeMap[current];
  
    bodyClass.replace(current, next);
    localStorage.setItem('theme', next);
  }
  
  document.getElementById('themeButton').onclick = toggleTheme;



  // Clock
const hour = document.querySelector('.hour');
const min = document.querySelector('.min');
const sec = document.querySelector('.sec');

const deg = 6;

setInterval(() => {
  let day = new Date();
  let hh = day.getHours() * 30;
  let mm = day.getMinutes() * deg;
  let ss = day.getSeconds() * deg;

  hour.style.setProperty('--rotate', (hh) + (mm/12) + "deg");
  min.style.setProperty('--rotate', mm + "deg");
  sec.style.setProperty('--rotate', ss + "deg");
});



const text = document.querySelector(".sec-text");

const textLoad = () => {
  setTimeout(() => {
    text.textContent = "Website EDP Jakarta 2"
  }, 0);
  setTimeout(() => {
    text.textContent = "Juaranya!"
  }, 4000);
  setTimeout(() => {
    text.textContent = "Uhuy!"
  }, 8000);
}
textLoad();
setInterval(textLoad, 12000);


function copas() {
  var copyText = document.getElementById("tulisan");


  copyText.select();
  navigator.clipboard.writeText(copyText.value);

  alert("Copied the text: " + copyText.value);
}

