function ProjectCard({project, terms}){
    const title = project.title.rendered;
    const image = project._embedded["wp:featuredmedia"][0].source_url;
    const alt = project._embedded["wp:featuredmedia"][0].alt_text;
    const projsrc = project.acf.link;

    const assignedTerms = terms.filter((term) => 
        (project["project-type"] || []).includes(term.id)
    );
    return(
        <>
        <div className="project-card">
            <div className="project-card-top">
                <img src={image} alt={alt} />
                <a href={projsrc}><h3>{title}</h3></a>
                <p></p>
            </div>
            <div className="project-tags d-flex">
                {assignedTerms.map((term) => (
                    <span className="project-tag" key={term.id}>
                        {term.name}
                    </span>
                ))}
                
            </div>
        </div>
        </>
    );
}

export default ProjectCard;