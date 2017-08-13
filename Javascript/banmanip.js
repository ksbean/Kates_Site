var banners = ["Images\image1.jpg", "Images\image2.jpg", "Images\image4.jpg"];
var counter = 1;

function next() {
  if (counter >= banners.length){
    counter=0;
  }
 document.getElementById("banner").src=banners[counter];
  counter++;
}