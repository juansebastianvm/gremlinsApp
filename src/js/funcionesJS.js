function disable(campo) {
  if (document.getElementById(campo).disabled) {
    document.getElementById(campo).disabled = false;
    document.getElementById(campo).value = "";
  } else {
    document.getElementById(campo).disabled = true;
  }

}
