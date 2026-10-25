const WP_API = "https://wpbackend.aarevalo.site/wp-json/wp/v2";

export async function getProjects() {
    const response = await fetch(`${WP_API}/projects?_embed`);
    if (!response.ok) {
        throw new Error("Failed to fetch projects");
    }

    return response.json();
}

export async function getProjectTerms() {
    const response = await fetch(`${WP_API}/project-type?per_page=100`);
    if (!response.ok) {
        throw new Error("Failed to load tags");
    }

    return response.json();
}