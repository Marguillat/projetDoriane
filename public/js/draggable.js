let moduleId

function allowDrop(ev) {
    ev.preventDefault();
  }
  
function drag(ev) {
  moduleId = ev.target.id
}

function drop(ev) {
  ev.preventDefault();

  let parent = (ev.target).parentElement
  console.log(parent.dataset.date)
  
  
  // ev.target.appendChild((document.getElementById(moduleId)).cloneNode(true));
}