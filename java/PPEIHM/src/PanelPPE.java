

import java.awt.Color;

import javax.swing.JPanel;

public class PanelPPE extends PPE {
	
	public PanelPPE() {
	//panel constructor
	JPanel pan= new JPanel();
	
	//couleur fond
	pan.setBackground(Color.gray);
	
	//on associe le panel
	this.setContentPane(pan);
	}



}
