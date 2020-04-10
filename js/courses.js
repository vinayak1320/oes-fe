function populate(s1,s2){
  var s1 = document.getElementById(s1);
  var s2 = document.getElementById(s2);
  s2.innerHTML = "";
  if(s1.value == "btech"){
    var optionArray = ["|","a|Computer Science Engineering","b|Civil Engineering","c|Mechanical Engineering","d|Electrical Engineering","e|Electronics & Communication Engineering"];
  } else if(s1.value == "btechl"){
    var optionArray = ["|","al|Computer Science Engineering","bl|Civil Engineering","cl|Mechanical Engineering","dl|Electrical Engineering","el|Electronics & Communication Engineering"];
  } else if(s1.value == "mtech"){
    var optionArray = ["|","m1|Electronics and Communication Engineering","m2|Computer Science And Engineering","m3|Manufacturing And Automation","m4|Electrical Power System"];
  }
  else if(s1.value == "dip"){
    var optionArray = ["|","d1|Automobile Engineering","d2|Civil Engineering","d3|Mechanical Engineering","d4|Electrical Engineering","d5|Electronics & Communication Engineering"];
  }
  else if(s1.value == "dipl"){
    var optionArray = ["|","d11|Automobile Engineering","d22|Civil Engineering","d33|Mechanical Engineering","d44|Electrical Engineering","d55|Electronics & Communication Engineering"];
  }
  else if(s1.value == "bba"){
    var optionArray = ["|","bba|BBA"];
  }
  else if(s1.value == "mba"){
    var optionArray = ["|","mba|MBA"];
  }
  else if(s1.value == "bca"){
    var optionArray = ["|","bca|BCA"];
  }
  else if(s1.value == "bvoc"){
    var optionArray = ["|","bv1|Travel And Tourism","bv2|Software Development [ IT ]","bv3|Banking, Financial Services And Insurance"];
  }
  for(var option in optionArray){
    var pair = optionArray[option].split("|");
    var newOption = document.createElement("option");
    newOption.value = pair[0];
    newOption.innerHTML = pair[1];
    s2.options.add(newOption);
  }
}