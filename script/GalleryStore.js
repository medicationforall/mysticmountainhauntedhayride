function GalleryStore(url,page){
  console.log('create gallery Store');
  this._constructor=function(){
    this.url=url;
    this.page=page;

  }


  this.load=function(){
    return $.getJSON(this.url+'/'+this.page,function(data){
      console.log(data);
      this._setup(data);
    }.bind(this));
  }

  this._setup=function(data){
    this.data = data.images;
  }

  this._constructor();
}

GalleryStore.prototype=new Core();
GalleryStore.prototype.constructor = GalleryStore;
