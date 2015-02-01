document.addEventListener('DOMContentLoaded', getRoommateOption);

function getRoommateOption() {
    var room = document.getElementById('vtes_bundle_websitebundle_user_room').value;
    var roommateDiv = document.getElementById('roommate-option');

    if (room == 2) {
        roommateDiv.style.display = 'block';
    } else {
        roommateDiv.style.display = 'none';
    }
}

