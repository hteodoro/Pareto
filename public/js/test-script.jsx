
import React from 'react';
import ReactDOM from 'react-dom';

// Defining the atual question level
let question_level = 1;
// Defining the atual subject index
let subject_marker = 0;
// Counting errors in the same level
let errors = 0;
// User performance
let performance = 0;
// Answer of the atual question
let question_answer = "";
// Array with all the subject's names
let subjects = [
    "Multiplicação",
    "Outro1",
    "Outro2"
];
// Array with the user performance in every subject
let subjectPerformance = {
    "Multiplicação": 0,
    "Outro1": 0,
    "Outro2": 0
};

// Array de Questões de Multiplicação
let multiply = [
    ["(3 x 4) + (5 x 2)", "3", "Multiplicação", 1],

    ["7 x 8 + (5 x 5 + 4 - 2)", "4", "Multiplicação", 2],

    ["(5 x 6) - 2 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Multiplicação", 3],

    ["(6 x 6) - 7 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Multiplicação", 4],

    ["(3 x 4) + (5 x 2)", "3", "Multiplicação", 4],

    ["(3 x 4) + (5 x 2)", "3", "Outro1", 1],

    ["7 x 8 + (5 x 5 + 4 - 2)", "4", "Outro1", 2],

    ["(5 x 6) - 2 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Outro1", 3],

    ["(6 x 6) - 7 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Outro1", 4],

    ["(3 x 4) + (5 x 2)", "3", "Outro2", 1],

    ["7 x 8 + (5 x 5 + 4 - 2)", "4", "Outro2", 2],

    ["(5 x 6) - 2 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Outro2", 3],

    ["(6 x 6) - 7 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Outro2", 4]
];

function loadQuestion() {
  // Random number generated to load a random question from the array
  let random;

  do {
    // Getting a random number that matches a same level question in the array
    random = Math.floor((Math.random() * multiply.length - 1) + 1);
  } while(multiply[random][3] != question_level || multiply[random][2] != subjects[subject_marker]);

  let dificulty = "";

  switch(question_level) {
    case 1:
      dificulty = "Fácil";
      break;
    case 2:
      dificulty = "Médio";
      break;
    case 3:
      dificulty = "Dificil";
      break;
    case 4:
      dificulty = "Muito Dificil";
  }

  // Getting the question Subject
  let subject = <p className="subject">{multiply[random][2] + " - " + dificulty}</p>
  // Gettin the atual question
  let question = <p className="question">{multiply[random][0]}</p>
  // Defining the question result/answer
  question_answer = multiply[random][1];

  ReactDOM.render(subject, document.getElementById('subject-holder'));
  ReactDOM.render(question, document.getElementById('question-holder'));
}

loadQuestion();

// TODO:: Listen to the input button click
$("#submit-answer").on('click', function() {
  // Getting the value gave by the user (user answer)
  let answer = $("#answer-input").val();
  // Check if the answer is empty
  if(answer == '') {
    loadEmptyError();
    return;
  }
  // Clear the error message (if it exists)
  clearEmptyError();
  // If the answer gave by the user is correct
  if(answer == question_answer) {
    // Checking if that are any previous error
    if(errors == 0) {
      // If that is not any error, receive the entire value
      // Increasing user performance
      performance += question_level;
    } else if(errors == 1) {
      // If that is one error, receive only the half of the value
      performance += question_level / 2;
    }
    // Increasing the question level
    question_level += 1;
    // Reseting errors in the same level
    errors = 0;
    // Clearing the input
    $("#answer-input").val('');
    // Load another question if it only had loaded 4 or less questions
    if(question_level <= 4) {
      // Loading another question
      loadMarkers('right');
      loadQuestion();
    } else {
      if(subject_marker == (subjects.length - 1)) {
        // If the user answer questions of all the subjects, save the performance
        savePerformance();
      } else {
        // Reseting question level
        question_level = 1;
        // Get the subject name to access the subjectPerformance values
        let subjectName = subjects[subject_marker];
        // Adding the user performance to the respective subject in the subjectPerformance array
        subjectPerformance[subjectName] += performance;
        // Adding to the subject marker to chance the question's subject
        subject_marker += 1;
        // Reseting performance
        performance = 0;
        // Reloading another question with a different subject
        loadMarkers('clear');
        loadQuestion();
      }
    }

  }

  // If is not correct
  else {
    // Clearing the input
    $("#answer-input").val('');
    // Increasing the number of errors
    errors += 1;
    // If it is the first error
    if(errors < 2) {
      // Reaload another question with the same level
      loadMarkers('wrong');
      loadQuestion();
    }
    // If it is the second error
    else {
      if(subject_marker == (subjects.length - 1)) {
        // If the user answer questions of all the subjects, save the performance
        savePerformance();
      } else {
        // Resetin errors
        errors = 0;
        // Reseting question level
        question_level = 1;
        // Get the subject name to access the subjectPerformance values
        let subjectName = subjects[subject_marker];
        // Adding the user performance to the respective subject in the subjectPerformance array
        subjectPerformance[subjectName] += performance;
        // Adding to the subject marker to chance the question's subject
        subject_marker += 1;
        // Reseting performance
        performance = 0;
        // Reloading another question with a different subject
        loadMarkers('clear');
        loadQuestion();
      }
    }
  }

});


$("#notknow-answer").on('click', function() {
  // Clearing the input
  $("#answer-input").val('');
  // Increasing the number of errors
  errors += 1;
  // If it is the first error
  if(errors < 2) {
    // Reaload another question with the same level
    loadMarkers('wrong');
    loadQuestion();
  }
  // If it is the second error
  else {
    if(subject_marker == (subjects.length - 1)) {
      // If the user answer questions of all the subjects, save the performance
      savePerformance();
    } else {
      // Resetin errors
      errors = 0;
      // Reseting question level
      question_level = 1;
      // Get the subject name to access the subjectPerformance values
      let subjectName = subjects[subject_marker];
      // Adding the user performance to the respective subject in the subjectPerformance array
      subjectPerformance[subjectName] += performance;
      // Adding to the subject marker to chance the question's subject
      subject_marker += 1;
      // Reseting performance
      performance = 0;
      // Reloading another question with a different subject
      loadMarkers('clear');
      loadQuestion();
    }
  }
});


function loadMarkers(config) {
  switch(config) {
    case 'right':
      $("#marker-list").append("<li class='marker right animated fadeIn'></li>");
      break;
    case 'wrong':
      $("#marker-list").append("<li class='marker wrong animated fadeIn'></li>");
      break;
    case 'clear':
      $("#marker-list").html("");
  }
}


function loadEmptyError() {
  const errorMessage = <p className="emptyError animated fadeIn">Insira uma resposta válida (Resposta vazia)</p>;
  ReactDOM.render(errorMessage, document.getElementById('error'));
}


function clearEmptyError() {
  ReactDOM.render("", document.getElementById('error'));
}


function savePerformance() {
  // TODO: Make a Request with the values
  let subjectName = subjects[0];
  alert(subjectPerformance[subjectName]);
}
