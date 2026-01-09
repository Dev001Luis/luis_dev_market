import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/**
 * Asynchronously loads skills from API and updates the DOM
 */
async function fetchSkills() {
    try {
        const response = await axios.get('/api/skills');
        const skills = response.data;

        const container = document.getElementById('skill-grid');
        container.ineritHTML = skills.map(skill => `
            <div class="card">
                <h3>${skill.name}</h3>
                <p>Level: ${skill.stars}</p>
            </div>
            `).join('');
    } catch (error) {
        console.error("API Call Failed", Error);
    }
}