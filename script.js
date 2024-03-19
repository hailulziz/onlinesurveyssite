// Define questions
const questions = [
[
    "What is your age?",
    "What is your gender?",
    "What is your highest level of education?",
    "What is your employment status?"
],
[
    "What is your primary language?",
    "What is your religion?",
    "Are you a caregiver for a family member?",
    "What is your sexual orientation?"
],
[
    "What is your ethnicity?",
    "What is your marital status?",
    "What is your current living arrangement (e.g., renting, owning, living with family)?",
    "How many children do you have?"
],
[
    "Do you have any disabilities?",
    "What is your military status?",
    "What is your country of origin?",
    "How long have you lived in your current location?"
],
[
    "What is your primary mode of transportation?",
    "What is your household size?",
    "Do you own any pets?",
    "What is your political affiliation?"
]
];

let questionsAnswered = localStorage.getItem('questionsAnswered') || 0;

let setAnswered = localStorage.getItem('setAnswered') || 0;

let money = localStorage.getItem('money') || 0;

let earnings = parseFloat(money);

document.getElementById('earnings').textContent = 'Earnings: ' + money + '$';
const shuffledQuestions = questions[setAnswered];

// Function to display current question
function displayQuestion() {
    const questionBox = document.getElementById('questionBox');
    questionBox.textContent = shuffledQuestions[questionsAnswered];
}

// Function to proceed to next question
function nextQuestion() {
    questionsAnswered++;

    localStorage.setItem('questionsAnswered', questionsAnswered);

    if (questionsAnswered >= shuffledQuestions.length) {
        localStorage.removeItem('questionsAnswered');
        if(setAnswered >= questions.length - 1){
            localStorage.removeItem('setAnswered')
        }
        else{
            setAnswered ++;
            localStorage.setItem('setAnswered', setAnswered);
        }

        earnings = earnings + 0.0001;

        money = earnings;

        localStorage.setItem('money', money);
        alert("You have answered all questions. Please refresh the page to get more.");
    } else {
        window.location.reload();
    }
}

// Event listener for next button click
document.getElementById('nextButton').addEventListener('click', nextQuestion);

// Display first question on page load
displayQuestion();
