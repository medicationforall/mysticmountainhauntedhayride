function Image(){
  this.template = '<div class="image dialog">'+
  '<div class="header">'+
  '<a class="closeButton" href="">X</a></div>'+
  '<div class="content">'+
  '<img src="" />'+
  '<div class="info">'+
  '<ul class="tags">'+
  '</ul>'+
  '</div>'+
  '</div>'+
  '<div class="footer">'+
  '<a href="" class="previousButton">Previous</a>'+
  '<a href="" class="nextButton">Next</a>'+
  '</div>'
  '</div>';

  this.url='';

  this.setup=function(){
    this.node = $(this.template).appendTo(this.parent.node);
    this.node.draggable({handle:'.header'});
    this._setupImgClose();
    this._setupNextImage();
    this._setupPrevImage();
    this._setupTagLink();
  }

  this._setupImgClose=function(){
    this.node.find('a.closeButton').click($.proxy(function(control,event){
      event.preventDefault();
      control.node.css('display','');
    },undefined,this));
  }

  this._setupNextImage=function(){
    this.node.find('.nextButton').click($.proxy(function(control,event){
      event.preventDefault();
      var thumb = control.thumb.next('.thumb');
      if(thumb.length>0){
        control.setThumb(thumb);
      }
    },undefined,this));
  }

  this._setupPrevImage=function(){
    this.node.find('.previousButton').click($.proxy(function(control,event){
      event.preventDefault();
      var thumb = control.thumb.prev('.thumb');
      if(thumb.length>0){
        control.setThumb(thumb);
      }
    },undefined,this));
  }

  this._setupTagLink=function(){
    this.node.find('.tags').on('click','a',$.proxy(function(control,event){
      event.preventDefault();
      var tag = $(this).attr('href');
      console.log('click tag link',tag);
      var store = this.closest(GalleryStore);
      store.setTag(tag);

    },undefined,this));
  }

  this.setThumb=function(thumb){
    this.thumb = thumb;
    var pic = thumb.data('pic');
    this.setTags(pic.tags);
    this.setUrl(thumb.find('a').attr('href'));
  }

  this.setTags=function(tags){
    var list = this.node.find('ul.tags');
    list.empty();

    for(var i=0,tag;tag=tags[i];i++){
      list.append('<li><a class="tagLink" href="'+tag+'">'+tag+'</a></li>');
    }

  }

  this.setUrl=function(url){
    this.url=url;
    this.node.find('img').attr('src',url);
  }

}

Image.prototype=new Core();
Image.prototype.constructor = Image;
