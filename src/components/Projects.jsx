import { use, useEffect, useState } from "react";
import { getProjects, getProjectTerms } from "../services/wordpress";
import ProjectCard from "./ProjectCard";

function Projects(){
    const [projects, setProjects] = useState([]);
    const [terms, setTerms] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState("");

    useEffect(()=>{
        async function fetchData() {
            try {
                const [projectsData, termsData] = await Promise.all([
                    getProjects(), getProjectTerms()
                ]);
                setProjects(projectsData);
                setTerms(termsData);
            } catch (err) {
                setError(err.message);
            }finally{
                setLoading(false);
            }
        }
        fetchData();
    }, []);
    if (loading) return <p>Loading projects...</p>;
    if (error) return <p>Error: {error}</p>;
    return(
        <>
            <section id="projects">
                <div className="container">
                    <div className="content">
                        <span className="dash"></span>
                        <p className="d-inline sub-title">CHECK OUT</p>
                        <h2>MY WORKS</h2>
                    </div>
                    <div className="content project-cards d-flex justify-content-center">
                      {projects.map((project)=>(
                        <ProjectCard key={project.id} project={project} terms={terms}/>
                      ))}
                    </div>
                </div>
            </section>
        </>
    );
}

export default Projects;