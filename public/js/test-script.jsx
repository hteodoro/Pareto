
import React from 'react';
import ReactDOM from 'react-dom';

// Defining the atual question level
let question_level = 1;
// Counting errors in the same level
let errors = 0;
// User performance
let performance = 0;
// Answer of the atual question
let question_answer = "";

// Array de Questões de Multiplicação
let multiply = [
    ["(3 x 4) + (5 x 2)", "3", "Multiplicação", 1],


    ["7 x 8 + (5 x 5 + 4 - 2)", "4", "Multiplicação", 2],


    ["(5 x 6) - 2 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Multiplicação", 3],


    ["(6 x 6) - 7 x ((5 x 4 - 1) + 4 x (4 - 1))", "4", "Multiplicação", 4]
];

function loadQuestion() {
  // Random number generated to load a random question from the array
  let random;

  do {
    // Getting a random number that matches a same level question in the array
    random = Math.floor((Math.random() * multiply.length - 1) + 1);
  } while(multiply[random][3] != question_level);

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
      loadQuestion();
    } else {
      savePerformance();
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
      loadQuestion();
    }
    // If it is the second error
    else {
      // TODO:: Save performance
      savePerformance();
    }
  }

});


function loadMarkers() {
  
}


function savePerformance() {
  // TODO: Make a Request with the values
  alert(performance);
}
