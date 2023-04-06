const videoSrcRegex = "https://www.youtube.com/embed/";
const teacherRegex = "Teacher: ";

function videoAddValidation() {
    /**
     *
     * @param vLink connecting our link field with js validation.
     * @param vTeacher connecting our teacher field with js validation.
     * Returning alert with a text, which is depending on user input.
     * @return alert
     */

    const vLink = document.getElementById("v-link");
    const vTeacher = document.getElementById("v-teacher");

    if (vLink.value !== "" && vTeacher.value !== "") {
        if (vLink.value.includes(videoSrcRegex)) {
            if (vTeacher.value.includes(teacherRegex)) {
                alert("Video has passed JS validation successfully!");
            } else {
                alert("Field \"Teacher\": name is incorrect!");
            }
        } else {
            alert("Link should contain path with parameter!");
        }
    } else {
        alert("Video link and Teacher fields must be completed!");
    }
}


function init() {
    /**
     * @param formEl - connected to the form id.
     * Sending confirmation after admin click "Add" button.
     * Sending admin to Courses.php to see the courses list.
     */
    const formEl = document.querySelector('#form-add-v');
    const vLink = document.getElementById("v-link");
    const vTeacher = document.getElementById("v-teacher");

    if (vLink.value.includes(videoSrcRegex) && vTeacher.value.includes(teacherRegex)) {
        vLink.addEventListener('keyup', videoAddValidation);
        vTeacher.addEventListener('keyup', videoAddValidation);
    }
    formEl.addEventListener('submit', videoAddValidation);
}