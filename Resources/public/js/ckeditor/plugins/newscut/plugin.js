(function(){
  //Section 1 : Code to execute when the toolbar button is pressed
  var a= {
    exec:function(editor){
      var theSelectedText = editor.insertHtml("<!--cut-->");
    }
  },

  //Section 2 : Create the button and add the functionality to it
  b='newscut';
  CKEDITOR.plugins.add(b,{
  init:function(editor){
  editor.addCommand(b,a);
  editor.ui.addButton("nesCut",{
      label:'Cut news', 
      icon:this.path+"scissors.png",
      command:b
      });
  }
  }); 
})();