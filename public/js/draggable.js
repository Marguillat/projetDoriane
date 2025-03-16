let moduleId;

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    moduleId = ev.target.id;
}

function drop(ev) {
    ev.preventDefault();

    let parent = ev.target.parentElement;
    let date = parent.dataset.date;
    let timeStart = parent.dataset.timeStart; // Assuming these are available in the dataset
    let timeEnd = parent.dataset.timeEnd;     // Assuming these are available in the dataset

    // Send AJAX request to update the database
    fetch('/updateLesson.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            moduleId: moduleId,
            date: date,
            time_start: timeStart,
            time_end: timeEnd
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Database updated successfully');
        } else {
            console.error('Error updating database:', data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });

    // ev.target.appendChild((document.getElementById(moduleId)).cloneNode(true));
}