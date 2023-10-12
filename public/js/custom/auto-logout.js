var timeout;

document.onmousemove = resetTimer;
document.onkeypress = resetTimer;

function logout() {
    // replace "/logout" with your logout page URL
    window.location.href = '/logout'; 
}

function resetTimer() {
    clearTimeout(timeout);
    timeout = setTimeout(logout, 300000); // 300000 ms = 5 minutes
}