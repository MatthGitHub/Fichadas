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
@Table(name = "TIPOAUSENCIAS")
@XmlRootElement
@NamedQueries({
    @NamedQuery(name = "Tipoausencias.findAll", query = "SELECT t FROM Tipoausencias t"),
    @NamedQuery(name = "Tipoausencias.findByIdTipoAusencia", query = "SELECT t FROM Tipoausencias t WHERE t.idTipoAusencia = :idTipoAusencia"),
    @NamedQuery(name = "Tipoausencias.findByCodigo", query = "SELECT t FROM Tipoausencias t WHERE t.codigo = :codigo"),
    @NamedQuery(name = "Tipoausencias.findByDescripcion", query = "SELECT t FROM Tipoausencias t WHERE t.descripcion = :descripcion"),
    @NamedQuery(name = "Tipoausencias.findByJustificada", query = "SELECT t FROM Tipoausencias t WHERE t.justificada = :justificada"),
    @NamedQuery(name = "Tipoausencias.findByTipoFranco", query = "SELECT t FROM Tipoausencias t WHERE t.tipoFranco = :tipoFranco")})
public class Tipoausencias implements Serializable {

    private static final long serialVersionUID = 1L;
    @Id
    @Basic(optional = false)
    @Column(name = "IdTipoAusencia")
    private Integer idTipoAusencia;
    @Column(name = "Codigo")
    private String codigo;
    @Column(name = "Descripcion")
    private String descripcion;
    @Column(name = "Justificada")
    private Boolean justificada;
    @Column(name = "TipoFranco")
    private Boolean tipoFranco;

    public Tipoausencias() {
    }

    public Tipoausencias(Integer idTipoAusencia) {
        this.idTipoAusencia = idTipoAusencia;
    }

    public Integer getIdTipoAusencia() {
        return idTipoAusencia;
    }

    public void setIdTipoAusencia(Integer idTipoAusencia) {
        this.idTipoAusencia = idTipoAusencia;
    }

    public String getCodigo() {
        return codigo;
    }

    public void setCodigo(String codigo) {
        this.codigo = codigo;
    }

    public String getDescripcion() {
        return descripcion;
    }

    public void setDescripcion(String descripcion) {
        this.descripcion = descripcion;
    }

    public Boolean getJustificada() {
        return justificada;
    }

    public void setJustificada(Boolean justificada) {
        this.justificada = justificada;
    }

    public Boolean getTipoFranco() {
        return tipoFranco;
    }

    public void setTipoFranco(Boolean tipoFranco) {
        this.tipoFranco = tipoFranco;
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (idTipoAusencia != null ? idTipoAusencia.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Tipoausencias)) {
            return false;
        }
        Tipoausencias other = (Tipoausencias) object;
        if ((this.idTipoAusencia == null && other.idTipoAusencia != null) || (this.idTipoAusencia != null && !this.idTipoAusencia.equals(other.idTipoAusencia))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "kronosiii.negocio.entidades.Tipoausencias[ idTipoAusencia=" + idTipoAusencia + " ]";
    }
    
}
