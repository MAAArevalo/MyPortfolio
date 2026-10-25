import { use, useEffect, useState } from "react";
import { getProjectTerms } from "../services/wordpress";

function About(){

    const [terms, setTerms] = useState([]);
    const [error, setError] = useState("");

    useEffect(()=>{
        getProjectTerms()
            .then((data) => setTerms(data))
            .catch((err) => setError(err.message))
    },[]);
    
    if (error) return <p>Error: {error}</p>;
    console.log(getProjectTerms());
    return(
        <>
            <section id="about">
                <div className="container">
                    <div className="d-flex align-center">
                        <div id="about-img">
                            <img src="/images/Arevalo_profile.webp" alt="Arevalo" />
                        </div>
                        <div className="about-content">
                            <div className="content">
                                <span className="dash"></span>
                                <p className="d-inline sub-title">A LITTLE BIT</p>
                                <h2>ABOUT ME</h2>
                                <p>I'm a WordPress developer with 6 years of experience building websites from scratch and working with popular WordPress builders and plugins. I've worked on both informational and e-commernce websites, with experience in Elementor, ACF, WooCommerce, and more.</p>
                                <h3>Skills</h3>
                                <div id="skills-tabs">
                                    {terms.map((term)=> (
                                        <span className="skill-tab" key={term.id}>{term.name}</span>
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </>
    );
}

export default About;