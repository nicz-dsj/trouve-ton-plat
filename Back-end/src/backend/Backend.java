/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package backend;

import backend.fenetre.MenuPrincipal;
import java.io.File;
import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Aro
 */
public class Backend {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        new MenuPrincipal().setVisible(true);
        String filePath = new File("").getAbsolutePath();
        filePath = new File("../code").getAbsolutePath();
        //System.out.println(filePath);
    }
    
    
}


