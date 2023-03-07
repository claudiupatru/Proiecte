const computerChoiceDisplay=document.getElementById('computer-choice');
const userChoiceDisplay = document.getElementById('user-choice');
const resultDisplay = document.getElementById('result');
let userChoice;
let computerChoice;
let result;
const possibleChoices = document.querySelectorAll('button');

possibleChoices.forEach(possibleChoices => possibleChoices.addEventListener("click",(e) => {
    userChoice =e.target.id;
    userChoiceDisplay.innerHTML = userChoice;
    generateComputerChoice();
    getResult();
}))

function generateComputerChoice(){
    const randomNumber = Math.floor( Math.random() * possibleChoices.length) + 1;
    
    console.log(randomNumber)

    if (randomNumber === 1){
        computerChoice = 'rock';
    }
    if (randomNumber === 2){
        computerChoice = 'scissors';
    }
    if (randomNumber === 3){
        computerChoice = 'paper';
    }

    computerChoiceDisplay.innerHTML = computerChoice;
}

function getResult(){
    if (computerChoice === userChoice){
        result = "Draw";
    }else if(computerChoice === "paper" && userChoice ==="rock"){
        result = "Computer wins!";
    }else if(computerChoice === "rock" && userChoice === "scissors"){
        result = "Computer wins!";
    }else if(computerChoice === "scissors" && userChoice ==="paper"){
        result = "Computer wins!";
    }else{
        result = "User wins!";
    }

    resultDisplay.innerHTML = result;
}
