import React from 'react'
import { Input } from './components/Input';
import { ComboBoxSexo } from './components/ComboBox';
import "../css/RegisterView.css"

function RegisterView() {
    return (
        <div className='Register'>
            <div className='RegisterLeft'>
                <div className='LayoutCandidateTitle'>
                    Datos del joven aspirante
                </div>
                <div className='LayoutCandidateInputs1'>
                    <Input text='Nombres'
                    classNameLabel='Label'
                    classNameInput='InputLeft'/>

                    <Input text='Apellidos'
                    classNameLabel='Label'
                    classNameInput='InputLeft'/>

                    <Input text='E-mail'
                    classNameLabel='Label'
                    classNameInput='InputLeft'/>

                    <Input text='Contraseña'
                    type='password'
                    classNameLabel='Label'
                    classNameInput='InputLeft'/>

                    <Input text='Fecha de nacimiento'
                    type='date'
                    classNameLabel='Label'
                    classNameInput='InputDate'/>

                    <Input text='Telefono'
                    type='tel'
                    classNameLabel='Label'
                    classNameInput='InputLeft'
                    placeholder='667-231-8212'/>

                    <Input text='Colonia'
                    classNameLabel='Label'
                    classNameInput='InputLeft'/>
                </div>
                <div className='LayoutCandidateInputs2'>
                    <Input text='Calle'
                    classNameLabel='Label'
                    classNameInput='InputNumber'/>

                    <Input text='Número'
                    classNameLabel='Label'
                    classNameInput='InputNumber'/>

                    <Input text='Codigo postal'
                    classNameLabel='Label'
                    classNameInput='InputCP'
                    placeholder='#4477'/>

                    <ComboBoxSexo/>
                </div>
            </div>
            <div className='RegisterRight'>
                <div className='LayoutTutorsTitle'>
                    Datos del tutor
                </div>
                <Input text='Nombres'
                classNameLabel='Label'
                classNameInput='InputRight'/>

                <Input text='Apellidos'
                classNameLabel='Label'
                classNameInput='InputRight'/>

                <Input text='E-mail'
                classNameLabel='Label'
                classNameInput='InputRight'/>

                <Input text='Telefono'
                type='tel'
                classNameLabel='Label'
                classNameInput='InputRight'
                placeholder='667-231-8212'/>
                <div className='LayoutButtons'>
                    <button className='Btn'>
                    </button>
                    <button className='Btn'>
                    </button>
                </div>
            </div>
        </div>
    );
}

export default RegisterView