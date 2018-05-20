$(document).ready(function(){
  console.log('main ready');

  var galleryViewer=new GalleryViewer('https://southerntierstables.com','gallery.php?json=true&tag=hauntedHayRide');
  galleryViewer.init();

	var list = galleryViewer.load();

  $.when.apply($,list).done(function(){
    console.log('loaded gallery viewer');
    galleryViewer.setup();
    galleryViewer.register();
  });
});
