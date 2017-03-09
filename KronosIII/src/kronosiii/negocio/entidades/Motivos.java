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
@Table(name = "MOTIVOS")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Motivos.findAll", query = "SELECT m FROM Motivos m"),
    @NamedQuery(name = "Motivos.findByIdMotivo", query = "SELECT m FROM Motivos m WHERE m.idMotivo = :idMotivo"),
    @NamedQuery(name = "Motivos.findByDescripcion", query = "SELECT m FROM Motivos m WHERE m.descripcion = :descripcion")})
public class Motivos implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdMotivo")
    private Integer idMotivo;
    @Column(name = "Descripcion")
    private String descripcion;

    public Motivos() {
    }

    public Motivos(Integer idMotivo) {
        this.idMotivo = idMotivo;
    }

    public Integer getIdMotivo() {
        return idMotivo;
    }

    public void setIdMotivo(Integer idMotivo) {
        this.idMotivo = idMotivo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idMotivo != null ? idMotivo.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Motivos)) {
            return false;
        }
        Motivos other = (Motivos) object;
        if ((this.idMotivo == null && other.idMotivo != null) || (this.idMotivo != null && !this.idMotivo.equals(other.idMotivo))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Motivos[ idMotivo=" + idMotivo + " ]";
    }
    
}
