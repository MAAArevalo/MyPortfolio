import { MdCode } from "react-icons/md";
import { MdGridView } from "react-icons/md";
import { BiSolidWrench } from "react-icons/bi";


function Skills(){
    return(
        <>
            <section id="skills">
                <div className="container">
                    <div className="content">
                        <span className="dash"></span>
                        <p className="d-inline sub-title">WHAT I DO</p>
                        <h2>Services I Offer</h2>
                    </div>
                    <div className="content d-flex services-card">
                        <div className="service-card">
                            <div className="service-icon"><MdCode /></div>
                            <div className="service-description">
                                <h3>WordPress Development</h3>
                                <p>Responsive custom WordPress websites, theme setup, optimization, maintenance.</p>
                            </div>
                        </div>
                        <div className="service-card">
                            <div className="service-icon"><MdGridView /></div>
                            <div className="service-description">
                                <h3>Elementor Development</h3>
                                <p>Responsive and user-friendly websites built with Elementor, from simple pages to complex site structures.</p>
                            </div>
                        </div>
                        <div className="service-card">
                            <div className="service-icon"><BiSolidWrench /></div>
                            <div className="service-description">
                                <h3>Website Fixes & Optimizations</h3>
                                <p>Bug fixes, performance improvements, plugin issues, responsive fixes and more.</p>                                
                            </div>                            
                        </div>
                    </div>
                </div>
            </section>        
        </>
    );
}

export default Skills;