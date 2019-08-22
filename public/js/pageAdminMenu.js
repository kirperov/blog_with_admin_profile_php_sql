var iconAdminImageZero = document.getElementById('img-menu-admin-0');
var iconAdminImageOne = document.getElementById('img-menu-admin-1');
var iconAdminImageTwo = document.getElementById('img-menu-admin-2');
var iconAdminImageTree = document.getElementById('img-menu-admin-3');




iconAdminImageZero.addEventListener("click", function() {
  iconAdminImageZero.classList.remove("infinite");
  iconAdminImageZero.classList.remove("pulse");
  iconAdminImageZero.classList.add("zoomOut");
});

iconAdminImageOne.addEventListener("click", function() {
  iconAdminImageOne.classList.add("zoomOut");
  iconAdminImageOne.classList.remove("infinite pulse");
  if ( iconAdminImageOne.classList.contains('MyClass') )

  document.getElementById("MyElement").classList.toggle('zoomOut');
});

iconAdminImageTwo.addEventListener("click", function() {
  iconAdminImageTwo.classList.add("zoomOut");
  iconAdminImageTwo.classList.remove("infinite pulse");
  if ( iconAdminImageTwo.classList.contains('MyClass') )

  document.getElementById("MyElement").classList.toggle('zoomOut');
});

iconAdminImageTree.addEventListener("click", function() {
  iconAdminImageTree.classList.add("zoomOut");
  iconAdminImageTree.classList.remove("infinite pulse");
  if ( iconAdminImageTree.classList.contains('MyClass') )

  document.getElementById("MyElement").classList.toggle('zoomOut');
});
