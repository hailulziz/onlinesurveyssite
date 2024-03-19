//Display for no surveys present
let surveyArray = document.getElementsByClassName('survey-item')

if(surveyArray.length == 0){
    document.getElementById('no-surveys').style.display = 'block'
}
