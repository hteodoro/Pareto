
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
  "Operações Básicas",
  "Operações com Frações",
  "Potênciação",
  "Radiciação"
];
// Array with all the questions
let questions = [
  // OPERAÇÕES BÁSICAS
  ["(3 x 4) + (5 x 2)", "5", "Operações Básicas", 1],
  ["(8 / 2) + (4 / 2)", "5", "Operações Básicas", 1],
  ["(4 x 2 / 4) + 16/2 + 3 x 2", "5", "Operações Básicas", 2],
  ["(8 x 5 + 5) + 5 x 4 + 10", "5", "Operações Básicas", 2],
  ["10 x 0,5 + 2 x 4 + 3", "5", "Operações Básicas", 3],
  ["0,6 x 0,6 + 1/2 + 1/4 ", "5", "Operações Básicas", 3],
  ["0,6 x 0,02 / 0,003 + (4/16)", "5", "Operações Básicas", 4],
  ["0,5 x 0,006 x (300 / 15)", "5", "Operações Básicas", 4],
  // OPERAÇÕES COM FRAÇÕES
  ["(2 / 2 x 3 / 2) + 2/2", "5", "Operações com Frações", 1],
  ["(3 / 2 + 3 / 2) x 2/1", "5", "Operações com Frações", 1],
  ["(2 / 2) + (1 / 4) x (1 / 2)", "5", "Operações com Frações", 2],
  ["(3 / 2) + (4 / 3) x (2 / 4)", "5", "Operações com Frações", 2],
  ["(18 / 2 / 18 / 4) x (5 / 2 / 15 / 3)", "5", "Operações com Frações", 3],
  ["(15 / 3) / (6 / 12) x (12 / 4) / (4 / 12)", "5", "Operações com Frações", 3],
  ["(5 / 5) + (15 / 5) / (4 / 3) x (2 / 3)", "5", "Operações com Frações", 4],
  ["(8 x 3) / (16 / 2) + 2/4 + 5/10 ", "5", "Operações com Frações", 4],
  // POTENCIAÇÃO
  ["2 ^ 1 + 40 ^ 0", "5", "Potênciação", 1],
  ["4 ^ 2 + 2 ^ 2", "5", "Potênciação", 1],
  ["(2 ^ 2) x (4 ^ 2) + 2 ^ 2 ", "5", "Potênciação", 2],
  ["(2 ^ 1) + (2 ^ 4) x 1 ^ 2", "5", "Potênciação", 2],
  ["(2 ^ 3 / 3 ^ 2) + (4 ^ 2) x (3 ^ 2)", "5", "Potênciação", 3],
  ["(5 ^ 4 / 5 ^ 2) + (3 ^ 4) x (20 ^ 0)", "5", "Potênciação", 3],
  ["(3 ^ 2 x 1 ^ 4) / (3 ^ 4) + 2 ^ 0", "5", "Potênciação", 4],
  ["(5 ^ 2 / 5 ^ 1) + (20 ^ 1) x (4 ^ 2)", "5", "Potênciação", 4],
  // RADICAIS √
  ["(√5) ^ 3", "5", "Radiciação", 1],
  ["(√3) ^ 2", "5", "Radiciação", 1],
  ["√45 / √5", "5", "Radiciação", 2],
  ["√24 / √4", "5", "Radiciação", 2],
  ["(4 / √4)", "5", "Radiciação", 3],
  ["(6 + 2 / √4)", "5", "Radiciação", 3],
  ["3√3 x 4√3 + 2", "5", "Radiciação", 4],
  ["(√256 x 2√3) x 2√3", "5", "Radiciação", 4]
];

// Array with the user performance in every subject
let subjectPerformance = {
  "Operações Básicas": 0,
  "Operações com Frações": 0,
  "Potênciação": 0,
  "Radiciação": 0
};

// // Array de Questões de Multiplicação
// let questions = [
//     ["(3 x 4) + (5 x 2)", "3", "Multiplicação", 1],
//
//     ["7 x 8 + (5 x 5 + 4 - 2)", "4", "Multiplicação", 2],
//
//     ["(5 x 6) - 2 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Multiplicação", 3],
//
//     ["(6 x 6) - 7 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Multiplicação", 4],
//
//     ["(3 x 4) + (5 x 2)", "3", "Multiplicação", 4],
//
//     ["(3 x 4) + (5 x 2)", "3", "Divisão", 1],
//
//     ["7 x 8 + (5 x 5 + 4 - 2)", "4", "Divisão", 2],
//
//     ["(5 x 6) - 2 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Divisão", 3],
//
//     ["(6 x 6) - 7 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Divisão", 4],
//
//     ["(3 x 4) + (5 x 2)", "3", "Fração", 1],
//
//     ["7 x 8 + (5 x 5 + 4 - 2)", "4", "Fração", 2],
//
//     ["(5 x 6) - 2 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Fração", 3],
//
//     ["(6 x 6) - 7 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Fração", 4]
// ];

function loadQuestion() {
  // Random number generated to load a random question from the array
  let random;

  do {
    // Getting a random number that matches a same level question in the array
    random = Math.floor((Math.random() * questions.length - 1) + 1);
  } while(questions[random][3] != question_level || questions[random][2] != subjects[subject_marker]);

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
  let subject = <p className="subject">{questions[random][2] + " - " + dificulty}</p>
  // Gettin the atual question
  let question = <p className="question">{questions[random][0]}</p>
  // Defining the question result/answer
  question_answer = questions[random][1];

  ReactDOM.render(subject, document.getElementById('subject-holder'));
  ReactDOM.render(question, document.getElementById('question-holder'));
}

// Loading the question for the first time
loadQuestion();

// TODO:: Listen to the input button click
$("#submit-answer").on('click', function() {
  // Getting the value gave by the user (user answer)
  let answer = $("#answer-input").val();
  // Check if the answer is empty
  if(answer == '') {
    // Loading the empty error message
    loadEmptyError();
    // Killing the script
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
      // Loading another question
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
        // Loading another question
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
      // Loading another question
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
        // Loading another question
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
      // Loading another question
      loadQuestion();
    }
  }
});


function loadMarkers(config) {
  switch(config) {
    case 'right':
      // Loading a marker with the right answer style
      $("#marker-list").append("<li class='marker right animated fadeIn'></li>");
      break;
    case 'wrong':
      // Loading a marker with the wrong answer style
      $("#marker-list").append("<li class='marker wrong animated fadeIn'></li>");
      break;
    case 'clear':
      // Clearing the markers
      $("#marker-list").html("");
  }
}


function loadEmptyError() {
  // Empty error message
  const errorMessage = <p className="emptyError animated fadeIn">Insira uma resposta válida (Resposta vazia)</p>;
  // Loading the Empty error message
  ReactDOM.render(errorMessage, document.getElementById('error'));
}


function clearEmptyError() {
  // Clearing the empty error message
  ReactDOM.render("", document.getElementById('error'));
}

$("#save-answer").on('click', function() {
  savePerformance()
});

function savePerformance() {
  // Executing a loop to the performance values
  for(let i in subjectPerformance) {
    // Getting the subject name
    let subject = i;
    // Getting the test performance on the subject
    let performance = subjectPerformance[i];
    // Making an AJAX Request to save the performance data
    // TODO:: Check to see why the POST is not working
    $.ajax({
      url: "/performance",
      type: "GET",
      data: {subject: subject, performance: performance},
      // success: function(data) {
      //     window.location.href = "/app/test";
      // }
    });
  }

  window.location.href = "/app/test";
}
