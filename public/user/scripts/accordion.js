

let active;

const toggleAccordion = async (id, index, div, event) => {

event.stopPropagation();


    if (active == id) {
        // alert(active)
        active = false
    } else {
        // alert(active)
        active = id
    }



    if (active == id) {
        document.getElementById(`plusSign${id}`).classList.remove("translate-x-0", "rotate-0")
        document.getElementById(`minusSign${id}`).classList.remove("-translate-x-20")
        document.getElementById(`accordionContent${id}`).classList.remove("max-h-0", "py-0")

        document.getElementById(`plusSign${id}`).classList.add("translate-x-7", "rotate-45")
        document.getElementById(`minusSign${id}`).classList.add("translate-x-0")
        document.getElementById(`accordionContent${id}`).classList.add("max-h-80", "py-4")
    }else{
        document.getElementById(`plusSign${id}`).classList.add("translate-x-0", "rotate-0")
        document.getElementById(`minusSign${id}`).classList.add("-translate-x-20")
        document.getElementById(`accordionContent${id}`).classList.add("max-h-0", "py-0")

        document.getElementById(`plusSign${id}`).classList.remove("translate-x-7", "rotate-45")
        document.getElementById(`minusSign${id}`).classList.remove("translate-x-0")
        document.getElementById(`accordionContent${id}`).classList.remove("max-h-80", "py-4")
    }
    

        let mainDiv = Array.from(document.getElementById(div).children)
        mainDiv.splice(index, 1)

        let accordionHead = [];
        let accordionBody = [];
        let accordionPlusSigns = []
        let accordionMinusSigns = []


        mainDiv.forEach(e => {
            accordionHead.push(Array.from(e.children)[0])
            accordionBody.push(Array.from(e.children)[1])
        })



        accordionHead.forEach(e => {
            accordionPlusSigns.push(Array.from(Array.from(e.children)[1].children)[0]);
            accordionMinusSigns.push(Array.from(Array.from(e.children)[1].children)[1]);
        })

        accordionBody.forEach(e => {
            e.classList.remove("max-h-80", "py-4")
            e.classList.add("max-h-0", "py-0")
        })

        accordionPlusSigns.forEach(e => {
            e.classList.remove("translate-x-7", "rotate-45")
            e.classList.add("translate-x-0", "rotate-0")
        })

        accordionMinusSigns.forEach(e => {
            e.classList.remove("translate-x-0")
            e.classList.add("-translate-x-20")
        })



}









function mappingAccordions() {


    const shipping = [
        {
            id: 1,
            title: `What Shipping Methods Are Available?`,
            text: `Ex Portland Pitchfork irure mustache. Eutra fap before they sold out literally. Aliquip ugh bicycle rights actually mlkshk, seitan squid craft beer tempor.`
        },
        {
            id: 2,
            title: `Do You Ship Internationally?`,
            text: `Hoodie tote bag mixtape tofu. Typewriter jean shorts wolf quinoa, messenger bag organic freegan cray.`
        },
        {
            id: 3,
            title: `How Long Will It Take To Get My Package?`,
            text: `Swag slow-carb quinoa VHS typewriter pork belly brunch, paleo single-origin coffee Wes Anderson. Flexitarian Pitchfork forage, literally paleo fap pour-over. Wes Anderson Pinterest YOLO fanny pack meggings, deep v XOXO chambray sustainable slow-carb raw denim church-key fap chillwave Etsy. +1 typewriter kitsch, American Apparel tofu Banksy Vice.`
        },
    ]

    const payment = [
        {
            id: 1,
            title: `What Payment Methods Are Accepted?`,
            text: `Fashion axe DIY jean shorts, swag kale chips meh polaroid kogi butcher Wes Anderson chambray next level semiotics gentrify yr. Voluptate photo booth fugiat Vice. Austin sed Williamsburg, ea labore raw denim voluptate cred proident mixtape excepteur mustache. Twee chia photo booth readymade food truck, hoodie roof party swag keytar PBR DIY.`
        },
        {
            id: 2,
            title: `Is Buying On-Line Safe?`,
            text: `Art party authentic freegan semiotics jean shorts chia cred. Neutra Austin roof party Brooklyn, synth Thundercats swag 8-bit photo booth. Plaid letterpress leggings craft beer meh ethical Pinterest.`
        },

    ]

    shipping.forEach((e,i) => {
        document.getElementById('accordions').innerHTML += `
        <div class='w-full container mx-auto mb-4 bg-skin-inverted rounded-md overflow-hidden'>
        <div class='w-full px-4 py-4 flex justify-between items-center cursor-pointer'
            onclick="toggleAccordion(${e.id}, ${i}, 'accordions', event)">
            <p class="cursor-pointer font-bold text-skin-primary">${e.title}</p>
            <button onclick="toggleAccordion(${e.id}, ${i}, 'accordions', event)"
                class='w-8 h-8 p-1 text-xl rounded-md bg-skin-main text-skin-secondary flex justify-center items-center relative overflow-hidden'>
    
                <!-- PLUS SVG -->
                <svg id="plusSign${e.id}" class="absolute duration-500 transition-all transform translate-x-0 rotate-0" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                    </path>
                </svg>
    
                <!-- MINUS SVG -->
    
                <svg id="minusSign${e.id}" class="absolute duration-500 transition-all transform -translate-x-20" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                    </path>
                </svg>
    
            </button>
    
           
        </div>
        <div id="accordionContent${e.id}" class="h-max overflow-hidden text-skin-primary px-4 duration-500 max-h-0 py-0">
            <p>
             ${e.text}
            </p>
        </div>
    </div>
        `
    })


    payment.forEach((e,i) => {

        document.getElementById('accordions2').innerHTML += `
        <div class='w-full container mx-auto mb-4 bg-skin-inverted rounded-md overflow-hidden'>
        <div class='w-full px-4 py-4 flex justify-between items-center cursor-pointer'
            onclick="toggleAccordion(${e.id+'2'}, ${i}, 'accordions2', event)">
            <p class="cursor-pointer font-bold text-skin-primary">${e.title}</p>
            <button onclick="toggleAccordion(${e.id+'2'}, ${i}, 'accordions2', event)"
                class='w-8 h-8 p-1 text-xl rounded-md bg-skin-main text-skin-secondary flex justify-center items-center relative overflow-hidden'>

                <!-- PLUS SVG -->
                <svg id="plusSign${e.id+'2'}" class="absolute duration-500 transition-all transform translate-x-0 rotate-0" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                    </path>
                </svg>

                <!-- MINUS SVG -->

                <svg id="minusSign${e.id+'2'}" class="absolute duration-500 transition-all transform -translate-x-20" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                    </path>
                </svg>

            </button>

           
        </div>
        <div id="accordionContent${e.id+'2'}" class="h-max overflow-hidden text-skin-primary px-4 duration-500 max-h-0 py-0">
            <p>
            ${e.text}
            </p>
        </div>
    </div>
        ` 
    })



}
mappingAccordions()












// <div class='w-full container mx-auto mb-4 bg-skin-inverted rounded-md overflow-hidden'>
// <div class='w-full px-4 py-4 flex justify-between items-center cursor-pointer'
//     onclick="toggleAccordion(1)">
//     <p class="cursor-pointer font-bold text-skin-primary">What types of customized gifts do you
//         offer?</p>
//     <button onclick="toggleAccordion(1)"
//         class='w-8 h-8 p-1 text-xl rounded-md bg-skin-main text-skin-secondary flex justify-center items-center relative overflow-hidden'>

//         <!-- PLUS SVG -->
//         <svg id="plusSign1" class="absolute duration-500 transition-all transform" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
//             height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
//             <path
//                 d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
//             </path>
//         </svg>

//         <!-- MINUS SVG -->

//         <svg id="minusSign1" class="absolute duration-500 transition-all transform" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512"
//             height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
//             <path
//                 d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
//             </path>
//         </svg>

//     </button>

   
// </div>
// <div id="accordionContent1" class="h-max overflow-hidden text-skin-primary px-4 duration-500">
//     <p>
//         The particular relationship that exists between pets and their owners is captured in the
//         personalized posters, pillows, and canvas prints that we create.
//     </p>
// </div>
// </div>