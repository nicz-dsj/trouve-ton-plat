/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JPanel.java to edit this template
 */
package backend.fenetre;

import java.io.File;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.DefaultComboBoxModel;

/**
 *
 * @author Aro
 */
public class PanelPlat extends javax.swing.JPanel {

    private MenuPrincipal menuPrincipal;

    /**
     * Creates new form panelPlat
     */
    public PanelPlat() {
        initComponents();
    }
    
    public PanelPlat(MenuPrincipal menuPrincipal ,String idPlat) {
        initComponents();
        this.menuPrincipal = menuPrincipal;
        afficher(idPlat);
    }

    public PanelPlat(String pseudo, String nomPlat, String idPlat, String categorie, String note, String[] ingredients, String description, String recette, String image) {
        initComponents();
        this.pseudo.setText(pseudo);
        this.nomPlat.setText(nomPlat);
        this.idPlat.setText(idPlat);
        this.categorie.setText(categorie);
        this.note.setText(note);
        this.ingredients.setModel(new DefaultComboBoxModel(ingredients));
        this.description.setText(description);
        this.recette.setText(recette);
        this.SPImage.remove(0);
        this.SPImage.add( new PanelImage("plats\\" + image));
    }
    
    private void afficher(String idPlat) {
        String idUtilisateur = new String(), utilisateur = new String(), nomPlat = new String(), note = new String(), description = new String(), recette = new String(), idCategorie = new String(), categorie = new String(), img = new String();
        String[] ingredients = new String[1];
        int cpt = 0;
        Statement nomOrdre = menuPrincipal.connect();
        try {
            //Vas chercher les informations du plats
            ResultSet resultat = nomOrdre.executeQuery("SELECT * FROM Plat WHERE idPlat = '" + idPlat + "'");
            while (resultat.next()) {
                idUtilisateur = resultat.getString("IdUtilisateur");
                idCategorie = resultat.getString("IdCategorie");
                nomPlat = resultat.getString("Nom");
                description = resultat.getString("Description");
                note = resultat.getString("Note");
                recette = resultat.getString("recette");
                img = resultat.getString("img");
            }

            //Vas chercher les ingrédients du plat
            resultat = nomOrdre.executeQuery("SELECT COUNT(idIngredient) FROM Composer WHERE idPlat = '" + idPlat + "'");
            while (resultat.next()) {
                ingredients = new String[resultat.getInt(1)];
            }
            resultat = nomOrdre.executeQuery("SELECT i.IdIngredient, Nom FROM Ingredient i, Composer c WHERE c.IdPlat = " + idPlat + " AND c.IdIngredient = i.IdIngredient ORDER BY i.IdIngredient");
            cpt = 0;
            while (resultat.next()) {
                ingredients[cpt] = resultat.getString("IdIngredient") + " - " + resultat.getString("Nom");
                cpt++;
            }

            //Vas chercher l'utilisateur ayant soumis le plat
            resultat = nomOrdre.executeQuery("SELECT pseudoUtilisateur FROM Utilisateur WHERE idUtilisateur = '" + idUtilisateur + "'");
            while (resultat.next()) {
                utilisateur = resultat.getString("pseudoUtilisateur");
            }

            //Vas chercher la categorie du plat
            resultat = nomOrdre.executeQuery("SELECT Nom FROM Categorie WHERE IdCategorie = '" + idCategorie + "'");
            while (resultat.next()) {
                categorie = resultat.getString("Nom");
            }

        } catch (SQLException ex) {
            Logger.getLogger(MenuPrincipal.class.getName()).log(Level.SEVERE, null, ex);
        }
        this.pseudo.setText(utilisateur);
        this.nomPlat.setText(nomPlat);
        this.idPlat.setText(idPlat);
        this.categorie.setText(categorie);
        this.note.setText(note);
        this.ingredients.setModel(new DefaultComboBoxModel(ingredients));
        this.description.setText(description);
        this.recette.setText(recette);
        this.SPImage.remove(0);
        this.SPImage.add( new PanelImage("plats/" + img));
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel5 = new javax.swing.JLabel();
        jLabel11 = new javax.swing.JLabel();
        jLabel6 = new javax.swing.JLabel();
        ingredients = new javax.swing.JComboBox<>();
        jLabel7 = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        description = new javax.swing.JTextArea();
        jLabel8 = new javax.swing.JLabel();
        nomPlat = new javax.swing.JLabel();
        pseudo = new javax.swing.JLabel();
        jScrollPane2 = new javax.swing.JScrollPane();
        recette = new javax.swing.JTextArea();
        jLabel4 = new javax.swing.JLabel();
        note = new javax.swing.JLabel();
        jLabel9 = new javax.swing.JLabel();
        jLabel10 = new javax.swing.JLabel();
        idPlat = new javax.swing.JLabel();
        categorie = new javax.swing.JLabel();
        jLabel12 = new javax.swing.JLabel();
        SPImage = new javax.swing.JScrollPane();

        setForeground(new java.awt.Color(102, 102, 102));

        jLabel5.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel5.setForeground(new java.awt.Color(102, 102, 102));
        jLabel5.setText("Nom du plat :");

        jLabel11.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel11.setForeground(new java.awt.Color(102, 102, 102));
        jLabel11.setText("Image :");

        jLabel6.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel6.setForeground(new java.awt.Color(102, 102, 102));
        jLabel6.setText("Ingrédients :");

        ingredients.setModel(new javax.swing.DefaultComboBoxModel<>(new String[] { "Item 1", "Item 2", "Item 3", "Item 4" }));
        ingredients.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                ingredientsActionPerformed(evt);
            }
        });

        jLabel7.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel7.setForeground(new java.awt.Color(102, 102, 102));
        jLabel7.setText("Description :");

        description.setEditable(false);
        description.setColumns(20);
        description.setRows(5);
        jScrollPane1.setViewportView(description);

        jLabel8.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel8.setForeground(new java.awt.Color(102, 102, 102));
        jLabel8.setText("Recette :");

        nomPlat.setText("Nom Plat");

        pseudo.setText("Nom Utilisateur");

        recette.setEditable(false);
        recette.setColumns(20);
        recette.setRows(5);
        jScrollPane2.setViewportView(recette);

        jLabel4.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel4.setForeground(new java.awt.Color(102, 102, 102));
        jLabel4.setText("Soumis par :");

        note.setText("Note");

        jLabel9.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel9.setForeground(new java.awt.Color(102, 102, 102));
        jLabel9.setText("Note :");

        jLabel10.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel10.setForeground(new java.awt.Color(102, 102, 102));
        jLabel10.setText("Id du plat :");

        idPlat.setText("id PLat");

        categorie.setText("Categorie");

        jLabel12.setFont(new java.awt.Font("Segoe UI", 1, 12)); // NOI18N
        jLabel12.setForeground(new java.awt.Color(102, 102, 102));
        jLabel12.setText("Categorie :");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(this);
        this.setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.Alignment.TRAILING)
                    .addComponent(jScrollPane2)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addComponent(jLabel11, javax.swing.GroupLayout.PREFERRED_SIZE, 49, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addComponent(jLabel8, javax.swing.GroupLayout.PREFERRED_SIZE, 67, javax.swing.GroupLayout.PREFERRED_SIZE)
                            .addGroup(layout.createSequentialGroup()
                                .addComponent(jLabel9)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addComponent(note, javax.swing.GroupLayout.PREFERRED_SIZE, 252, javax.swing.GroupLayout.PREFERRED_SIZE))
                            .addGroup(layout.createSequentialGroup()
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                    .addComponent(jLabel10, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(jLabel12, javax.swing.GroupLayout.Alignment.LEADING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(categorie, javax.swing.GroupLayout.PREFERRED_SIZE, 252, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addComponent(idPlat, javax.swing.GroupLayout.PREFERRED_SIZE, 252, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING, false)
                                .addGroup(layout.createSequentialGroup()
                                    .addComponent(jLabel6)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                    .addComponent(ingredients, 0, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addGroup(layout.createSequentialGroup()
                                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.TRAILING)
                                            .addComponent(jLabel5, javax.swing.GroupLayout.Alignment.LEADING)
                                            .addComponent(jLabel7, javax.swing.GroupLayout.Alignment.LEADING))
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(nomPlat, javax.swing.GroupLayout.PREFERRED_SIZE, 252, javax.swing.GroupLayout.PREFERRED_SIZE))
                                    .addGroup(layout.createSequentialGroup()
                                        .addComponent(jLabel4)
                                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                        .addComponent(pseudo, javax.swing.GroupLayout.PREFERRED_SIZE, 258, javax.swing.GroupLayout.PREFERRED_SIZE))))
                            .addComponent(SPImage, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(0, 0, Short.MAX_VALUE)))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel4)
                    .addComponent(pseudo))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel5)
                    .addComponent(nomPlat))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel10)
                    .addComponent(idPlat))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel12)
                    .addComponent(categorie))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel9)
                    .addComponent(note))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jLabel6)
                    .addComponent(ingredients, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel7)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel8)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jScrollPane2, javax.swing.GroupLayout.PREFERRED_SIZE, 142, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel11)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(SPImage, javax.swing.GroupLayout.PREFERRED_SIZE, 100, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(12, Short.MAX_VALUE))
        );
    }// </editor-fold>//GEN-END:initComponents

    private void ingredientsActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_ingredientsActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_ingredientsActionPerformed


    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JScrollPane SPImage;
    private javax.swing.JLabel categorie;
    private javax.swing.JTextArea description;
    private javax.swing.JLabel idPlat;
    private javax.swing.JComboBox<String> ingredients;
    private javax.swing.JLabel jLabel10;
    private javax.swing.JLabel jLabel11;
    private javax.swing.JLabel jLabel12;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JLabel nomPlat;
    private javax.swing.JLabel note;
    private javax.swing.JLabel pseudo;
    private javax.swing.JTextArea recette;
    // End of variables declaration//GEN-END:variables
}
