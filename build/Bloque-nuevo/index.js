(()=>{"use strict";var e,i={94:()=>{const e=window.wp.blocks,i=window.wp.i18n,r=window.wp.blockEditor,o=window.wp.components,t=window.ReactJSXRuntime,n=window.React,s=JSON.parse('{"UU":"imperiosur/nuevo-bloque"}'),l=(0,t.jsxs)("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 24 24",children:[(0,t.jsx)("rect",{width:"24",height:"24",fill:"#0078FF"}),(0,t.jsx)("text",{x:"3.5",y:"16",fill:"#FFFFFF","font-size":"10","font-family":"Arial, sans-serif","font-weight":"bold",children:"IS"})]});(0,e.registerBlockType)(s.UU,{icon:l,edit:function({attributes:e,setAttributes:s}){const{images:l=[]}=e,a=(0,r.useBlockProps)();return(0,t.jsxs)("div",{...a,children:[(0,i.__)("CIRCULOS DE CATEGORIAS","imperiosur"),(0,t.jsx)("div",{...(0,r.useBlockProps)({className:"circle-container"}),children:l.map(((e,a)=>(0,n.createElement)("div",{...(0,r.useBlockProps)({className:"circle"}),key:a},(0,t.jsx)("img",{src:e.url,alt:e.alt}),(0,t.jsx)(o.TextControl,{label:(0,i.__)("Link","text-domain"),value:e.link,onChange:e=>{const i=[...l];i[a].link=e,s({images:i})}}),(0,t.jsx)(o.Button,{isDestructive:!0,onClick:()=>(e=>{const i=l.filter(((i,r)=>r!==e));s({images:i})})(a),style:{marginTop:"10px"},children:(0,i.__)("Remove","text-domain")}))))}),(0,t.jsx)(r.MediaUploadCheck,{children:(0,t.jsx)(r.MediaUpload,{onSelect:e=>{s({images:[...l,{url:e.url,alt:e.alt,link:e.link}]})},allowedTypes:["image"],render:({open:e})=>(0,t.jsx)(o.Button,{onClick:e,variant:"primary",style:{marginTop:"20px"},children:(0,i.__)("Add Image","text-domain")})})})]})}})}},r={};function o(e){var t=r[e];if(void 0!==t)return t.exports;var n=r[e]={exports:{}};return i[e](n,n.exports,o),n.exports}o.m=i,e=[],o.O=(i,r,t,n)=>{if(!r){var s=1/0;for(p=0;p<e.length;p++){for(var[r,t,n]=e[p],l=!0,a=0;a<r.length;a++)(!1&n||s>=n)&&Object.keys(o.O).every((e=>o.O[e](r[a])))?r.splice(a--,1):(l=!1,n<s&&(s=n));if(l){e.splice(p--,1);var c=t();void 0!==c&&(i=c)}}return i}n=n||0;for(var p=e.length;p>0&&e[p-1][2]>n;p--)e[p]=e[p-1];e[p]=[r,t,n]},o.o=(e,i)=>Object.prototype.hasOwnProperty.call(e,i),(()=>{var e={704:0,808:0};o.O.j=i=>0===e[i];var i=(i,r)=>{var t,n,[s,l,a]=r,c=0;if(s.some((i=>0!==e[i]))){for(t in l)o.o(l,t)&&(o.m[t]=l[t]);if(a)var p=a(o)}for(i&&i(r);c<s.length;c++)n=s[c],o.o(e,n)&&e[n]&&e[n][0](),e[n]=0;return o.O(p)},r=globalThis.webpackChunkimperiosur=globalThis.webpackChunkimperiosur||[];r.forEach(i.bind(null,0)),r.push=i.bind(null,r.push.bind(r))})();var t=o.O(void 0,[808],(()=>o(94)));t=o.O(t)})();