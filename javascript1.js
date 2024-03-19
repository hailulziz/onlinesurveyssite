//same for surveys page
let surveyArray1 = document.getElementsByClassName('survey-item')

if(surveyArray1.length == 0){
    document.getElementById('no-surveys').style.display = 'block';
    document.getElementById('no-surveys').style.height = '1000px';
    document.getElementById('no-surveys').style.marginTop = '10%';
    console.log('works so far')
}