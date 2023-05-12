window.setCookie = function(name, value, days) {
  var expires;
  if (days) {
    var date = new Date();
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
    expires = '; expires=' + date.toGMTString();
  }
  else {
    expires = '';
  }
  document.cookie = name + '=' + encodeURIComponent(value) + expires + '; path=/';
}

window.getCookie = function(c_name) {
  if (document.cookie.length > 0) {
    c_start = document.cookie.indexOf(c_name + '=');
    if (c_start != -1) {
      c_start = c_start + c_name.length + 1;
      c_end = document.cookie.indexOf(';', c_start);
      if (c_end == -1) {
        c_end = document.cookie.length;
      }
      return decodeURIComponent(document.cookie.substring(c_start, c_end));
    }
  }
  return '';
}

window.deleteCookie = function(name) {
  document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

// check value is not empty
window.isNotEmpty = function(val) {
  let is_not_empty = false;
  if ( val != undefined && val != null ) {
    is_not_empty = true;
    if ( Array.isArray(val) ) {
      is_not_empty = (val.length > 0);
    }
  }
  return is_not_empty;
}

// check input is not empty
window.isInputNotEmpty = function(target, type = null) {
  let is_not_empty = false;
  let input_target = $(document.getElementById(target));

  // file
  if ( type == 'file' ) {
    if ( (input_target[0] != undefined) && (input_target[0].files[0] != undefined) ) {
      is_not_empty = true;
    }
  }

  // other
  else {
    if ( (input_target != undefined) && isNotEmpty(input_target.val()) ) {
      is_not_empty = true;
    }
  }

  return is_not_empty;
}

// deep find object
window.deepFind = function(obj, path) {
  let paths = path.split('.')
    , current = obj
    , i;

  for (let i = 0; i < paths.length; ++i) {
    if (current[paths[i]] == undefined) {
      return undefined;
    } else {
      current = current[paths[i]];
    }
  }
  return current;
}

window.trimString = function(str) {
  return isNotEmpty(str) ? str.trim().replace(/\r?\n|\r|\\r?\\n/g, '') : str;
}

window.isJson = function(str) {
  try {
    JSON.parse(str);
  } catch (e) {
    return false;
  }
  return true;
}

window.generateUUID = function() { // Public Domain/MIT
  var d = new Date().getTime();//Timestamp
  var d2 = (performance && performance.now && (performance.now()*1000)) || 0;//Time in microseconds since page-load or 0 if unsupported
  return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
    var r = Math.random() * 16;//random number between 0 and 16
    if(d > 0){//Use timestamp until depleted
      r = (d + r)%16 | 0;
      d = Math.floor(d/16);
    } else {//Use microseconds since page-load if supported
      r = (d2 + r)%16 | 0;
      d2 = Math.floor(d2/16);
    }
    return (c === 'x' ? r : (r & 0x3 | 0x8)).toString(16);
  });
}
