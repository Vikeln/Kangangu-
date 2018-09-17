var vm = new Vue({
  el:'report',-
  data:{
    subjects:  ,//LIST of subject with their MARKS
    position:   ,   //student position calculated from function

    term:   $user-> ,
    exam: $user->exam_name,
    stream:  $user->  ,
    form:   $user-> ,
    address:  $user->  ,
    pnumber:  $user->  ,
    email:  $user->  ,
    htmlcontent :   "",
    imgsrc: ""
  computed:{
    total:function(){
      //total marks of the student calculator
      
    }
    grade :  function($mark){   //calculated
      if ($mark >=80) {
        return "A";
      }
      else if ($mark >=70) {
        return "B";
      }
      else if ($mark >= 60) {
        return "C";
      }
      else if ($mark >= 50) {
        return "D";
      }
      else {
        return "F";
      }
    }  ,
    comment : function ($mark){ //calculated
      if ($mark >=80) {
        return "Very Good";
      }
      else if ($mark >=70) {
        return "Good";
      }
      else if ($mark >= 60) {
        return "Average";
      }
      else if ($mark >= 50) {
        return "Need to improve";
      }
      else {
        return "Below average";
      }
    }   ,
  }
  }
}
)
