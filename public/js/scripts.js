let moduleId;

function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  moduleId = ev.target.id;
}

function dropAdd(ev) {
  ev.preventDefault();
  let target = ev.target;

  let date = target.dataset.date;
  let timeStart = target.dataset.timestart;
  let timeEnd = target.dataset.timeend;
  console.log(
    JSON.stringify({
      moduleId: moduleId,
      date: date,
      time_start: timeStart,
      time_end: timeEnd,
    }),
  );

  // Send AJAX request to update the database
  fetch("http://localhost:8000/public/updateLesson.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      moduleId: moduleId,
      date: date,
      time_start: timeStart,
      time_end: timeEnd,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        console.log("Database updated successfully");
        window.location.reload();
      } else {
        console.error("Error updating database:", data.message);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });

  // ev.target.appendChild((document.getElementById(moduleId)).cloneNode(true));
}

// validations scripts
document.addEventListener("DOMContentLoaded", () => {
  const heuresInput = document.getElementById("heures");
  if (heuresInput) {
    heuresInput.addEventListener("input", validateNumberInput);
  }
});

function validateNumberInput(event) {
  const input = event.target;
  input.value = input.value
    .replace(/[^0-9.]/g, "")
    .replace(/(\..*?)\..*/g, "$1");
}
