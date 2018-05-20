function GalleryViewer(url,page){
  console.log('create gallery Viewer');

  this.init=function(){
      this.add(new GalleryStore(this.url,this.page));
      this.add(new Image());
  }

  this._constructor=function(){
    this.url=url;
    this.page=page;
  }

  this.setup=function(){
      this.node = $('.galleryViewer');
      this.each('setup');

      var store = this.closest(GalleryStore);

      for(var i=0,pic;pic=store.data[i];i++){
        //console.log('process picture',pic);
        this.addPic(pic);
      }
  }

  this.addPic=function(pic){
      //console.log('add pic function');
      var thumb = $('<div class=thumb>'+
      '<a href="'+this.url+'/'+pic.path.replace('image/gallery','med')+'">'+
      '<img src="'+this.url+'/'+pic.path.replace('image/gallery','thumb')+'" />'+
      '</a>'+
      '</div>').appendTo(this.node);
      thumb.data('pic',pic);
      //console.log('set thumb data',thumb.data('pic'));

  }

  this.register=function(){
    this._setupImgClick();
    this.each('register');
  }

  this._setupImgClick=function(){
    this.node.on('click','.thumb a',$.proxy(function(control,event){
      event.preventDefault();
      var thumb = $(this).parent();
      control.openDialog(thumb);
    },undefined,this));
  }

  this.openDialog=function(thumb){
    var image = this.closest(Image);
    image.setThumb(thumb);
    image.node.css('display','block');
  }


  this._constructor();
}

GalleryViewer.prototype=new Core();
GalleryViewer.prototype.constructor = GalleryViewer;
