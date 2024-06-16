document.addEventListener("DOMContentLoaded", () => {
    const wheel = document.getElementById("wheel");
    const spinButton = document.getElementById("spinButton");
    
    spinButton.addEventListener("click", () => {
        const spinDegrees = Math.floor(Math.random() * 360) + 360 * 5; // 5 complete spins + random spin
        wheel.style.transform = `rotate(${spinDegrees}deg)`;
        
        // Simulate server request to get the result
        setTimeout(() => {
            fetch('server.php')
                .then(response => response.json())
                .then(data => {
                    alert(`抽獎結果: ${data.prize}`);
                })
                .catch(error => console.error('Error:', error));
        }, 4000); // Wait for the spin to complete (4 seconds)
    });
});
