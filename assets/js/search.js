function search(event) {
    'use strict';

    if (event.code !== 'Enter') { return; }

    var searchText = document.getElementById('search-input').value;

    window.location = "?search=" + searchText;
}
