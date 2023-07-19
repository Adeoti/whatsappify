import { useBlockProps, InspectorControls } from '@wordpress/block-editor'
import {Button, Icon, PanelBody, PanelRow, TextareaControl, ColorPicker, TextControl, __experimentalRadioGroup as RadioGroup, __experimentalRadio as Radio} from '@wordpress/components'

wp.blocks.registerBlockType('whatsappifyi/wafychat', {
    title: 'WhatsAppify Chat Button',
    icon: 'smiley',
    category: 'common',
    description: 'Create WhatsApp chat buttons and CTAs on any page.',
    attributes: {
        wafyBg: {type: 'string', default: '#128F3E'},
        wafyColor: {type: 'string', default: '#ffffff'},
        wafyNumber: {type: 'string', default: '000'},
        wafyText: {type: 'string', default: 'Chat our reps'},
        wafyMsg: {type: 'string', default: 'hello'},
        wafyShape: {type: 'string', default: '10'}
    },
    edit: wafyEditComponent,
    save: function(props){
        return null;
    }

});


function wafyEditComponent(props){
        const blockProps = useBlockProps({
            style: {
                backgroundColor: props.attributes.wafyBg,
                color: props.attributes.wafyColor,
                padding:'23px 26px',
                fontSize: '15px',
                fontWeight: '500',
                borderRadius: props.attributes.wafyShape+'px'
            }
        });

    //Set Bg
    function setBg(x){
        props.setAttributes({wafyBg: x.hex});
    }

    //Set Text Color
    function setColor(y){
        props.setAttributes({wafyColor: y.hex});
    }
    //Render JSX
    return(
        <> 
        <InspectorControls>
                    <PanelBody title="WhatsAppify Design">
                        
                        <PanelRow>
                                <TextControl 
                                label="Text" 
                                value={props.attributes.wafyText} 
                                onChange={text => { props.setAttributes({wafyText: text})}}/>
                        </PanelRow>
                        <PanelRow>
                                <TextControl 
                                label="No." 
                                style={{width:'100%'}}
                                value={props.attributes.wafyNumber} 
                                onChange={link => {props.setAttributes({wafyNumber: link})}}/>
                        </PanelRow>
                        <PanelRow>
                                <div
                                style={{width: '100%'}}>
                                    <TextareaControl
                                    value={props.attributes.wafyMsg}
                                    label='Msg'
                                    onChange={msg => {props.setAttributes({wafyMsg: msg})}}
                                    style={{width: '100%', resize:'none'}}
                                />
                                </div>
                                
                              
                        </PanelRow>
                        <PanelRow>
                            <RadioGroup 
                            label='Shape' 
                            onChange={shape => {props.setAttributes({wafyShape: shape})}} 
                            checked={props.attributes.wafyShape}>
                                <Radio value="10">Default</Radio>
                                <Radio value="0">Rectangle</Radio>
                                <Radio value="50">Rounded</Radio>
                            </RadioGroup>
                        </PanelRow>
                    </PanelBody>

                    <PanelBody title='WhatsAppify Skin'>
                    <PanelRow>
                            <h2>Background</h2>
                        </PanelRow>
                        <PanelRow>
                            <ColorPicker
                            color={props.attributes.wafyBg} 
                            onChangeComplete={x => setBg(x)}/>
                        </PanelRow>

                        <PanelRow>
                            <h2>Text Color</h2>
                        </PanelRow>
                        <PanelRow>
                            <ColorPicker
                            color={props.attributes.wafyColor}
                            onChangeComplete={x => setColor(x)}/>
                        </PanelRow>
                    </PanelBody>
            </InspectorControls>
            
                <Button {...blockProps}>
                    <i 
                    class="fab fa-whatsapp"
                    style={{fontSize: '23px'}}
                    ></i>
                     &nbsp;
                    {props.attributes.wafyText}
                </Button>
            
        </>
    )
}

