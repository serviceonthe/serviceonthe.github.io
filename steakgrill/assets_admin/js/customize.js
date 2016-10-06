var checkbox_id, textarea_id, checkbox, textarea, div;
/* edit the next two lines to match the ids of the elements in your form */
checkbox_id = 'item_select';
textarea_id = 'item_price';

window.addEvent('domready', function() {
  checkbox = $(checkbox_id);
  textarea = $(textarea_id);
  div = $(textarea_id+'_container_div');
  div.dissolve();
  showHide();
  checkbox.addEvent('click', showHide);
});

function showHide() {
  if ( checkbox.checked ) {
    div.reveal();
    textarea.disabled = false;
  } else {
    div.dissolve();
    textarea.value = '';
    textarea.disabled = true;
  }
}

