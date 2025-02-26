(()=>{"use strict";const e=window.wp.blocks,n=window.wp.blockEditor,i=window.wp.components,r=window.ReactJSXRuntime,s=JSON.parse('{"UU":"custom/servicios"}'),o=(0,r.jsxs)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",children:[(0,r.jsx)("rect",{width:"24",height:"24",fill:"#0078FF"}),(0,r.jsx)("text",{x:"3.5",y:"16",fill:"#FFFFFF","font-size":"10","font-family":"Arial, sans-serif","font-weight":"bold",children:"IS"})]});(0,e.registerBlockType)(s.UU,{icon:o,edit:({attributes:e,setAttributes:s})=>{const{servicios:o=[]}=e,t=(e,n,i)=>{const r=o.map(((r,s)=>s===e?{...r,[n]:i}:r));s({servicios:r})};return(0,r.jsxs)("div",{...(0,n.useBlockProps)(),children:[(0,r.jsx)("style",{children:"\n                .servicios-container {\n                    display: flex;\n                    flex-wrap: nowrap;\n                    gap: 20px;\n                }\n                .servicio-card {\n                    width: 100%;\n                    max-width: 300px;\n                    margin: 0 auto;\n                    background: #fff;\n                    padding: 15px;\n                    border-radius: 10px;\n                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);\n                    display: flex;\n                    flex-direction: column;\n                    align-items: center;\n                    box-sizing: border-box;\n                }\n                .servicio-imagen {\n                    max-width: 100px;\n                    height: 100px;\n                    margin-bottom: 10px;\n                    border-radius: 8px;\n                    display: block;\n                }\n                .servicio-titulo {\n                    font-size: 18px;\n                    font-weight: bold;\n                    margin: 0 0 5px;\n                }\n                .servicio-prestador {\n                    font-size: 14px;\n                    color: #777;\n                    margin: 0 0 5px;\n                }\n                .servicio-descripcion {\n                    font-size: 14px;\n                    margin: 5px 0;\n                    text-align: center;\n                }\n                .servicio-whatsapp {\n                    display: inline-block;\n                    background-color: #25D366;\n                    color: white;\n                    text-align: center;\n                    padding: 8px 15px;\n                    border-radius: 5px;\n                    text-decoration: none;\n                    margin-top: 10px;\n                }\n            "}),(0,r.jsx)("div",{className:"servicios-container",children:o.map(((e,a)=>(0,r.jsxs)("div",{className:"servicio-card",children:[(0,r.jsx)(n.MediaUploadCheck,{children:(0,r.jsx)(n.MediaUpload,{onSelect:e=>t(a,"imagen",e.url),allowedTypes:["image"],render:({open:n})=>(0,r.jsx)(i.Button,{onClick:n,children:e.imagen?(0,r.jsx)("img",{src:e.imagen,alt:e.titulo,className:"servicio-imagen"}):"Subir imagen"})})}),(0,r.jsx)(i.TextControl,{label:"Título del servicio",value:e.titulo,onChange:e=>t(a,"titulo",e)}),(0,r.jsx)(i.TextControl,{label:"Prestador del servicio",value:e.prestador,onChange:e=>t(a,"prestador",e)}),(0,r.jsx)(i.TextareaControl,{label:"Descripción del servicio",value:e.descripcion,onChange:e=>t(a,"descripcion",e)}),(0,r.jsx)(i.TextControl,{label:"Número de WhatsApp",value:e.whatsapp,onChange:e=>t(a,"whatsapp",e)}),(0,r.jsx)(i.TextareaControl,{label:"Mensaje de WhatsApp",help:"Mensaje predeterminado que se enviará al abrir WhatsApp.",value:e.mensaje,onChange:e=>t(a,"mensaje",e)}),(0,r.jsx)(i.Button,{isDestructive:!0,onClick:()=>(e=>{const n=o.filter(((n,i)=>i!==e));s({servicios:n})})(a),children:"Eliminar servicio"})]},a)))}),(0,r.jsx)(i.Button,{isPrimary:!0,onClick:()=>{s({servicios:[...o,{imagen:"",titulo:"",prestador:"",descripcion:"",whatsapp:"",mensaje:""}]})},children:"Añadir nuevo servicio"})]})},save:function({attributes:e}){const{fallbackCurrentYear:i,showStartingYear:s,startingYear:o}=e;if(!i)return null;let t;return t=s&&o?o+"–"+i:i,(0,r.jsxs)("p",{...n.useBlockProps.save(),children:["© ",t]})}})})();