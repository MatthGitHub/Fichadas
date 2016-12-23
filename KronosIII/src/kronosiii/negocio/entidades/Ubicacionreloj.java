/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kronosiii.negocio.entidades;

import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.xml.bind.annotation.XmlRootElement;

/**
 *
 * @author Administrador
 */
@Entity
@Table(name = "UBICACIONRELOJ")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Ubicacionreloj.findAll", query = "SELECT u FROM Ubicacionreloj u"),
    @NamedQuery(name = "Ubicacionreloj.findByIdReloj", query = "SELECT u FROM Ubicacionreloj u WHERE u.idReloj = :idReloj"),
    @NamedQuery(name = "Ubicacionreloj.findByNumeroReloj", query = "SELECT u FROM Ubicacionreloj u WHERE u.numeroReloj = :numeroReloj"),
    @NamedQuery(name = "Ubicacionreloj.findByUbicacionReloj", query = "SELECT u FROM Ubicacionreloj u WHERE u.ubicacionReloj = :ubicacionReloj")})
public class Ubicacionreloj implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdReloj")
    private Integer idReloj;
    @Column(name = "NumeroReloj")
    private Integer numeroReloj;
    @Column(name = "UbicacionReloj")
    private String ubicacionReloj;

    public Ubicacionreloj() {
    }

    public Ubicacionreloj(Integer idReloj) {
        this.idReloj = idReloj;
    }

    public Integer getIdReloj() {
        return idReloj;
    }

    public void setIdReloj(Integer idReloj) {
        this.idReloj = idReloj;
    }

    public Integer getNumeroReloj() {
        return numeroReloj;
    }

    public void setNumeroReloj(Integer numeroReloj) {
        this.numeroReloj = numeroReloj;
    }

    public String getUbicacionReloj() {
        return ubicacionReloj;
    }

    public void setUbicacionReloj(String ubicacionReloj) {
        this.ubicacionReloj = ubicacionReloj;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idReloj != null ? idReloj.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Ubicacionreloj)) {
            return false;
        }
        Ubicacionreloj other = (Ubicacionreloj) object;
        if ((this.idReloj == null && other.idReloj != null) || (this.idReloj != null && !this.idReloj.equals(other.idReloj))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Ubicacionreloj[ idReloj=" + idReloj + " ]";
    }
    
}
