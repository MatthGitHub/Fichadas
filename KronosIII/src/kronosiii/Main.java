/*
 *View controller
 */
package kronosiii;

import javax.swing.JOptionPane;
import javax.swing.JPanel;
import kronosiii.gui.controlAccesoFichadas.ControlAccesoFichadas;
import kronosiii.gui.fichadas.Fichadas;
import kronosiii.gui.menuPrincipal.MenuPrincipal;
import kronosiii.gui.usuarios.Usuarios;

/**
 *
 * @author Administrador
 */
public class Main extends javax.swing.JFrame {
    private static Main esteFrame;
    /************************************** Variables GUI *******************************************/
    private MenuPrincipal menuPrincipal;
    private Fichadas fichadas;
    private ControlAccesoFichadas controlAcceso;
    private Usuarios usuarios;
    /************************************** Variables GUI *******************************************/

    private Main() {
        initComponents();
        setSize(800, 600);
        setTitle("Kronos III");
        setDefaultCloseOperation(0);
        setLocationRelativeTo(null);
        setVisible(true);
        goMenuPrincipal();
    }
    
    /**
     * Devuelve el MainFrame
     * @return 
     */
    public static Main getMainFrame(){
        if(esteFrame == null){
            esteFrame = new Main();
        }
        return esteFrame;
    }
    
    /**
     * Carga los paneles que le paso por parametro
     * @param elpa 
     */
    private void cargarPanel(JPanel elpa){
        getContentPane().removeAll();
        getContentPane().add(elpa);
        revalidate();
        repaint();

    }
    /**
     * Muestra el panel MenuPrincipal
     */
    public void goMenuPrincipal(){
        menuPrincipal = MenuPrincipal.getMenuPrincipal();
        cargarPanel(menuPrincipal);
    }
    
    /**
     * Muestra el panel Fichadas
     */
    public void goFichadas(){
        fichadas = Fichadas.getFichadas();
        cargarPanel(fichadas);
    }
    
    /**
     * Muestra el panel Control de acceso a fichadas
     */
    public void goControlDeAccesoAFichadas(){
        controlAcceso = ControlAccesoFichadas.getControlAccesoFichadas();
        cargarPanel(controlAcceso);
    }
    
    /**
     * Muestra el panel Usuarios
     */
    public void goUsuarios(){
        usuarios = Usuarios.getUsuarios();
        cargarPanel(usuarios);
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jMenuBar1 = new javax.swing.JMenuBar();
        jmArchivo = new javax.swing.JMenu();
        jmiFichadas = new javax.swing.JMenuItem();
        jmiMenuPrincipal = new javax.swing.JMenuItem();
        jmiSalir = new javax.swing.JMenuItem();
        jmConfiguracion = new javax.swing.JMenu();
        jmiControlAcceso = new javax.swing.JMenuItem();
        jmiUsuarios = new javax.swing.JMenuItem();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jmArchivo.setText("Archivo");

        jmiFichadas.setAccelerator(javax.swing.KeyStroke.getKeyStroke(java.awt.event.KeyEvent.VK_F, java.awt.event.InputEvent.CTRL_MASK));
        jmiFichadas.setText("Fichadas");
        jmiFichadas.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiFichadasActionPerformed(evt);
            }
        });
        jmArchivo.add(jmiFichadas);

        jmiMenuPrincipal.setAccelerator(javax.swing.KeyStroke.getKeyStroke(java.awt.event.KeyEvent.VK_M, java.awt.event.InputEvent.CTRL_MASK));
        jmiMenuPrincipal.setText("Menu Principal");
        jmiMenuPrincipal.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiMenuPrincipalActionPerformed(evt);
            }
        });
        jmArchivo.add(jmiMenuPrincipal);

        jmiSalir.setAccelerator(javax.swing.KeyStroke.getKeyStroke(java.awt.event.KeyEvent.VK_X, java.awt.event.InputEvent.CTRL_MASK));
        jmiSalir.setText("Salir");
        jmiSalir.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiSalirActionPerformed(evt);
            }
        });
        jmArchivo.add(jmiSalir);

        jMenuBar1.add(jmArchivo);

        jmConfiguracion.setText("Configuracion");

        jmiControlAcceso.setText("Control de Accesos a Fichadas");
        jmiControlAcceso.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiControlAccesoActionPerformed(evt);
            }
        });
        jmConfiguracion.add(jmiControlAcceso);

        jmiUsuarios.setText("Usuarios");
        jmiUsuarios.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jmiUsuariosActionPerformed(evt);
            }
        });
        jmConfiguracion.add(jmiUsuarios);

        jMenuBar1.add(jmConfiguracion);

        setJMenuBar(jMenuBar1);

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jmiSalirActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiSalirActionPerformed
        // TODO add your handling code here:
        if(JOptionPane.showConfirmDialog(null,"Seguro desea salir?","Confirmar",JOptionPane.YES_OPTION) == 0){
            System.exit(0);
        }
    }//GEN-LAST:event_jmiSalirActionPerformed

    private void jmiFichadasActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiFichadasActionPerformed
        // TODO add your handling code here:
        goFichadas();
    }//GEN-LAST:event_jmiFichadasActionPerformed

    private void jmiControlAccesoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiControlAccesoActionPerformed
        // TODO add your handling code here:
        goControlDeAccesoAFichadas();
    }//GEN-LAST:event_jmiControlAccesoActionPerformed

    private void jmiMenuPrincipalActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiMenuPrincipalActionPerformed
        // TODO add your handling code here:
        goMenuPrincipal();
    }//GEN-LAST:event_jmiMenuPrincipalActionPerformed

    private void jmiUsuariosActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jmiUsuariosActionPerformed
        // TODO add your handling code here:
        goUsuarios();
    }//GEN-LAST:event_jmiUsuariosActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Main.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Main.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Main.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Main.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Main().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JMenuBar jMenuBar1;
    private javax.swing.JMenu jmArchivo;
    private javax.swing.JMenu jmConfiguracion;
    private javax.swing.JMenuItem jmiControlAcceso;
    private javax.swing.JMenuItem jmiFichadas;
    private javax.swing.JMenuItem jmiMenuPrincipal;
    private javax.swing.JMenuItem jmiSalir;
    private javax.swing.JMenuItem jmiUsuarios;
    // End of variables declaration//GEN-END:variables
}
