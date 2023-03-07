const cardArray = [
    {
        name: "fries",
        img: 'fries.png',
    },
    {
        name: "cheeseburger",
        img: 'cheeseburger.png',
    },
    {
        name: "hotdog",
        img: 'hotdog.png',
    },
    {
        name: "ice-cream",
        img: 'ice-cream.png',
    },
    {
        name: "milkshake",
        img: 'milkshake.png',
    },
    {
        name: "pizza",
        img: 'pizza.png',
    },
    {
        name: "fries",
        img: 'fries.png',
    },
    {
        name: "cheeseburger",
        img: 'cheeseburger.png',
    },
    {
        name: "hotdog",
        img: 'hotdog.png',
    },
    {
        name: "ice-cream",
        img: 'ice-cream.png',
    },
    {
        name: "milkshake",
        img: 'milkshake.png',
    },
    {
        name: "pizza",
        img: 'pizza.png',
    }
]

cardArray.sort(() => 0.5 - Math.random())
const restart = document.querySelector('#restart')
const gridDisplay = document.querySelector('#grid')
const resultDisplay = document.querySelector('#result')
let cardChosen = []
let cardChosenIds = []
const cardsWon =[]

function createBoard(){
    for (let i=0 ; i < 12; i++){
        const card = document.createElement('img')
        card.setAttribute('src', 'blank.png')
        card.setAttribute('data-id',i)
        card.addEventListener('click', flipCard)
        gridDisplay.appendChild(card)
    }
   
    start.removeEventListener('click',createBoard)
    start.style.display = "none"
    restart.style.display = "none"
}
const start = document.querySelector("#start")
createBoard()

function checkMatch(){
    const cards = document.querySelectorAll('img')

if (cardChosenIds[0] == cardChosenIds[1]){
    cards[cardChosenIds[0]].setAttribute('src','blank.png')
        cards[cardChosenIds[1]].setAttribute('src','blank.png')
    alert('you have clicked the same image')
}

   if( cardChosen[0] == cardChosen[1]){
    alert('You found a match!')
    cards[cardChosenIds[0]].setAttribute('src','white.png')
    cards[cardChosenIds[1]].setAttribute('src','white.png')
    cards[cardChosenIds[0]].removeEventListener('click', flipCard)
    cards[cardChosenIds[1]].removeEventListener('click', flipCard)
    cardsWon.push(cardChosen)
    }else {
        cards[cardChosenIds[0]].setAttribute('src','blank.png')
        cards[cardChosenIds[1]].setAttribute('src','blank.png')
        alert('try again')
    }
    cardChosen = []
    cardChosenIds = []
    resultDisplay.innerHTML = cardsWon.length

    if (cardsWon.length == (cardArray.length/2)){
        resultDisplay.innerHTML = 'You won'
    }
}

function flipCard(){
   const cardId = this.getAttribute('data-id')
   cardChosen.push(cardArray[cardId].name)
   cardChosenIds.push(cardId)
   this.setAttribute('src', cardArray[cardId].img)
   if (cardChosen.length === 2){
    setTimeout(checkMatch, 500)
   }
}