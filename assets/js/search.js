function search(event) {
    'use strict';

    if (event.code !== 'Enter') { return; }

    window.location = "?search=" + event.target.value
}
