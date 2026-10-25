
import { Carousel } from "react-responsive-carousel";
import "react-responsive-carousel/lib/styles/carousel.min.css";

function ProjectCarousel() {
    return(
        <>
            <Carousel autoPlay>
                <div>
                    <img alt="" src="http://lorempixel.com/output/cats-q-c-640-480-1.jpg" />
                    <p className="legend">Legend 1</p>
                </div>
                <div>
                    <img alt="" src="http://lorempixel.com/output/cats-q-c-640-480-1.jpg" />
                    <p className="legend">Legend 2</p>
                </div>
                <div>
                    <img alt="" src="http://lorempixel.com/output/cats-q-c-640-480-1.jpg" />
                    <p className="legend">Legend 3</p>
                </div>
            </Carousel>
        </>
    );
}

export default ProjectCarousel;