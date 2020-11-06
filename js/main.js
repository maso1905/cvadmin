"use strict"

// Variables
let websiteEl = document.getElementById("websiteList");


let workEl = document.getElementById("work-table");
let eduEl = document.getElementById("edu-table");
let addWorkbtn = document.getElementById("addWork");
let addEdubtn = document.getElementById("addEducation");

let schoolInput = document.getElementById("school");
let programInput = document.getElementById("program");
let eduStartInput = document.getElementById("edustart");
let eduEndInput = document.getElementById("eduend");

let companyInput = document.getElementById("company");
let titleInput = document.getElementById("title");
let workStartInput = document.getElementById("workstart");
let workEndInput = document.getElementById("workend");

// Event listener
window.addEventListener('load', getWork());
window.addEventListener('load', getEducation());
window.addEventListener('load', getWebsite());
if(addWorkbtn && addEdubtn){
    addWorkbtn.addEventListener('click', addWork, false);
    addEdubtn.addEventListener('click', addEducation, false);
}

// Functions
// GETs all website info
function getWebsite() {
    websiteEl.innerHTML = '';
    fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/website.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(web => {
          websiteEl.innerHTML +=
            `     
            <h3 style="float: left;">ID: ${web.id}</h3>
            <table>
            <thead>
            <tr>
                <td>Title</td>
                <td>URL</td>
                <td>Description</td>
            </tr>
            </thead>
            <tr>
            <td><input type="text" value="${web.title}" name="title" id="title${web.id}"></td>
            <td><input type="text" value="${web.url}" name="url" id="url${web.id}"></td>
            <td><input type="text" value="${web.description}" name="description" id="description${web.id}"></td>
            <td><input type="button" value="Update" class="submit" onClick="updateWebsite(${web.id})"></td>
            </tr>
            </table><br><br>
            `
        })
    })
  }


// GETs work all tables
function getWork() {
  workEl.innerHTML = '';
  fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/work.php')
  .then(response => response.json())
  .then(data => {
      data.forEach(work => {
          workEl.innerHTML +=
          `          
          <h3 style="float: left;">ID: ${work.id}</h3>
          <table>
          <thead>
          <tr>
              <td>Company</td>
              <td>Title</td>
              <td>Start</td>
              <td>End</td>
          </tr>
          </thead>
          <tr>
          <td><input type="text" value="${work.company}" name="company" id="company${work.id}"></td>
          <td><input type="text" value="${work.title}" name="title" id="title${work.id}"></td>
          <td><input type="text" value="${work.start}" name="workstart" id="workstart${work.id}"></td>
          <td><input type="text" value="${work.end}" name="workend" id="workend${work.id}"></td>
          <td><input type="button" value="Update" class="submit" onClick="updateWork(${work.id})"></td>
          <td><input type="button" value="Delete" class="submit" onClick="deleteWork(${work.id})"></td>
          </tr>
          </table><br><br>

          `
      })
  })
}

// GETs all education tables
function getEducation() {
  eduEl.innerHTML = '';
  fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/education.php')
  .then(response => response.json())
  .then(data => {
      data.forEach(edu => {
          eduEl.innerHTML +=
          `            
          <h3 style="float: left;">ID: ${edu.id}</h3>
          <table>
          <thead>
          <tr>
              <td>School</td>
              <td>Program</td>
              <td>Start</td>
              <td>End</td>
          </tr>
          </thead>
          <tr>
          <td><input type="text" value="${edu.school}" name="school" id="school${edu.id}"></td>
          <td><input type="text" value="${edu.program}" name="program" id="program${edu.id}"></td>
          <td><input type="text" value="${edu.start}" name="edustart" id="edustart${edu.id}"></td>
          <td><input type="text" value="${edu.end}" name="eduend" id="eduend${edu.id}"></td>
          <td><input type="button" value="Update" class="submit" onClick="updateEducation(${edu.id})"></td>
          <td><input type="button" value="Delete" class="submit" onClick="deleteEducation(${edu.id})"></td>
          </tr>
          </table><br><br>
          `
      })
  })
}

// Update Website info
function updateWebsite(id) {

    let newtitle = document.getElementById('title' + id);
    let newurl = document.getElementById('url' + id);
    let newdesc = document.getElementById('description' + id);

    newtitle = newtitle.value;
    newurl = newurl.value;
    newdesc = newdesc.value;

    let website = {'id': id, 'title': newtitle, 'url': newurl, 'description': newdesc};

  fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/website.php?id=' + id, {
          method: 'PUT',
          body: JSON.stringify(website)
      })
      .then(response => response.json())
      .then(data => {
        getWebsite();
      })
      .catch(error => {
          console.log('Error: ', error);
      })
}

// Update Work
function updateWork(id) {

    let newcompany = document.getElementById('company' + id);
    let newtitle = document.getElementById('title' + id);
    let newstart = document.getElementById('workstart' + id);
    let newend = document.getElementById('workend' + id);

    newcompany = newcompany.value;
    newtitle = newtitle.value;
    newstart = newstart.value;
    newend = newend.value;

    let work = {'id': id, 'company': newcompany, 'title': newtitle, 'start': newstart, 'end': newend};

  fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/work.php?id=' + id, {
          method: 'PUT',
          body: JSON.stringify(work)
      })
      .then(response => response.json())
      .then(data => {
        getWork();
      })
      .catch(error => {
          console.log('Error: ', error);
      })
}

// Delete Work
function deleteWork(id){
    fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/work.php?id=' + id, {
        method: 'DELETE',
    })
    .then(response => response.json())
    .then(data => {
      getWork();
    })
    .catch(error => {
        console.log('Error: ', error);
    })
}

// Add Work
function addWork() {
    let company = companyInput.value;
    let title = titleInput.value;
    let start = workStartInput.value;
    let end = workEndInput.value;

    let work = {'company': company, 'title': title, 'start': start, 'end': end};

    fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/work.php', {
        method: 'POST',
        body: JSON.stringify(work),
    })
    .then(response => response.json())
    .then(data => {
        getWork();
        companyInput.value = '';
        titleInput.value = '';
        workStartInput.value = '';
        workEndInput.value = '';
    })
    .catch(error => {
        console.log('Error: ', error);
    })
}

// Update Education
function updateEducation(id) {

    let newschool = document.getElementById('school' + id);
    let newprogram = document.getElementById('program' + id);
    let newstart = document.getElementById('edustart' + id);
    let newend = document.getElementById('eduend' + id);

    newschool = newschool.value;
    newprogram = newprogram.value;
    newstart = newstart.value;
    newend = newend.value;

    let education = {'id': id, 'school': newschool, 'program': newprogram, 'start': newstart, 'end': newend};

  fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/education.php?id=' + id, {
          method: 'PUT',
          body: JSON.stringify(education)
      })
      .then(response => response.json())
      .then(data => {
        getEducation();
      })
      .catch(error => {
          console.log('Error: ', error);
      })
}

// Delete Education
function deleteEducation(id){
    fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/education.php?id=' + id, {
        method: 'DELETE',
    })
    .then(response => response.json())
    .then(data => {
      getEducation();
    })
    .catch(error => {
        console.log('Error: ', error);
    })
}

// Add Work
function addEducation() {
    let school = schoolInput.value;
    let program = programInput.value;
    let start = eduStartInput.value;
    let end = eduEndInput.value;

    let education = {'school': school, 'program': program, 'start': start, 'end': end};

    fetch('http://studenter.miun.se/~maso1905/dt173g/rest/miun_courses/education.php', {
        method: 'POST',
        body: JSON.stringify(education),
    })
    .then(response => response.json())
    .then(data => {
        getEducation();
        schoolInput.value = '';
        programInput.value = '';
        eduStartInput.value = '';
        eduEndInput.value = '';
    })
    .catch(error => {
        console.log('Error: ', error);
    })
}