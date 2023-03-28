let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}


const cursor = document.querySelector(".cursor");

window.addEventListener("mousemove", (e) => {
  cursor.style.left = e.pageX + "px";
  cursor.style.top = e.pageY + "px";
  cursor.setAttribute("data-fromTop", cursor.offsetTop - scrollY);
  // console.log(e)
});
window.addEventListener("scroll", () => {
  const fromTop = cursor.getAttribute("data-fromTop");
  cursor.style.top = scrollY + parseInt(fromTop) + "px";
  console.log(scrollY);
});
window.addEventListener("click", () => {
  if (cursor.classList.contains("click")) {
    cursor.classList.remove("click");
    void cursor.offsetWidth; // trigger a DOM reflow
    cursor.classList.add("click");
  } else {
    cursor.classList.add("click");
  }
});

function openTab(evt, tabNm) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabNm).style.display = "block";
  evt.currentTarget.className += " active";
  
}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


function openTab1(event, tabName) {
  var j, tabcontent1, tablinks1;
  tabcontent1 = document.getElementsByClassName("tabcontent1");
  for (j = 0; j < tabcontent1.length; j++) {
    tabcontent1[j].style.display = "none";
  }
  tablinks1 = document.getElementsByClassName("tablinks1");
  for (j = 0; j < tablinks1.length; j++) {
    tablinks1[j].className = tablinks1[j].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  event.currentTarget.className += " active";
  
}

//map iframe max height property needs to be altered

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen1").click();
