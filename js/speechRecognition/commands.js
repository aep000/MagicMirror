


var commands{
  commandList{

  }

}



class command{
  constructor(actString, func, type) {
    this.actString = actString;
    this.func = func;
    this.typ = type;
  }
  check(inp){
    return(inp==this.actString);
  }
  execute(){
    return func();
  }

}
